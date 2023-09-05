<?php

namespace App\Services\QrCode;
use App\Jobs\AdjustUserQrCodeImagePathJob;
use App\Models\QrCodeType;
use App\Models\User;
use App\Services\ErrorCorrection\GetAllErrorCorrectionsIdsAndKeysAsKeyValueArrayService;
use App\Services\QrCodeDetails\QrCodeDetailsService;
use App\Services\QrCodeType\GetAllQrCodeTypesIdsAndKeysAsKeyValueArrayService;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Models\QrCode as ModelQrCode;

class QrCodeService
{
    public function createQrCode(User $user, array $data)
    {
        $fileName = str_replace(' ', '_',$data['name']).'-'. str_replace([' ', ':'], '', Carbon::now()) . '.png';

        switch($data['code_type'])
        {
            case 'text':
                $qrcodeGenerationState = $this->generateQr($fileName, $user->username, $data['image_size'], $data['error_correction'], $data['text']);
                break;
            case 'url':
                $slugs = ['http://', 'https://'];
                if(!in_array(substr($data['url'], 0, 7), $slugs) || !in_array(substr($data['url'], 0, 8), $slugs))
                {
                    $data['url'] = $slugs[1] . $data['url'];
                }
                $qrcodeGenerationState = $this->generateQr($fileName, $user->username, $data['image_size'], $data['error_correction'], $data['url']);
                break;
            case 'email':
                $slug = 'mailto:';
                $data['email'] = $slug . $data['email'];
                $qrcodeGenerationState = $this->generateQr($fileName, $user->username, $data['image_size'], $data['error_correction'], $data['email']);
                break;
            case 'phone':
                $slug = 'tel:';
                $data['phone'] = $slug . $data['phone'];
                $qrcodeGenerationState = $this->generateQr($fileName, $user->username, $data['image_size'], $data['error_correction'], $data['phone']);
                break;
            case 'gps':
                $slug = 'geo:';
                $gps = $slug . $data['latitude'] . ',' . $data['longitude'];
                $qrcodeGenerationState = $this->generateQr($fileName, $user->username, $data['image_size'], $data['error_correction'], $gps);
                break;
            case 'wifi':
                $wifi =  ['encryption' => $data['wifi_encryption'], 'ssid' => $data['wifi_ssid'], 'password' => $data['wifi_password'], 'is_hidden' => array_key_exists('wifi_is_hidden', $data) ? true : false];
                $qrcodeGenerationState = $this->generateWifiQr($fileName, $user->username, $data['image_size'], $data['error_correction'], $wifi);
                break;
            default:
                return 'Given QR Code Type does not exist!';
        }

        if($qrcodeGenerationState && Storage::disk('public')->exists($user->username . '/' . $fileName))
        {
            $qrCodeTypes = app(GetAllQrCodeTypesIdsAndKeysAsKeyValueArrayService::class)->execute();
            $errorCorrections = app(GetAllErrorCorrectionsIdsAndKeysAsKeyValueArrayService::class)->execute();

            $qrcode = ModelQrCode::create([
                'user_id' => $user->id,
                'qr_code_type_id' => $qrCodeTypes[$data['code_type']],
                'error_correction_id' => $errorCorrections[$data['error_correction']],
                'qr_code_name' => $data['name'],
                'qr_code_description' => $data['description'],
                'image_path' => $user->username . '/' . $fileName,
                'is_public' => array_key_exists('is_public', $data) ? 1 : 0,
            ]);

            if($qrcode)
            {
                $qrcodeDetails = app(QrCodeDetailsService::class)->initDetails($qrcode);

                return $qrcode;
            }

        }
    }

    public function generateQr(string $fileName, string $username, int $image_size, string $error_correction, string $data)
    {
        $state = Storage::disk('public')
                ->put($username . '/' . $fileName, QrCode::format('png')->size($image_size)->errorCorrection($error_correction)->generate($data));

        return $state;
    }

    // Implemented, because slug 'wifi:' generates text, not WiFi credentials.
    public function generateWifiQr(string $fileName, string $username, int $image_size, string $error_correction, array $data)
    {
        $state = Storage::disk('public')
                ->put($username . '/' . $fileName,
                QrCode::format('png')
                    ->size($image_size)
                    ->errorCorrection($error_correction)
                    ->wiFi([
                        'encryption' => $data['encryption'],
                        'ssid' => $data['ssid'],
                        'password' => $data['password'],
                        'hidden' => 'is_hidden'
                    ]));

        return $state;
    }

    public function renameUserDirecory(User $user, string $oldname, string $newname) : void
    {
        if (Storage::disk('public')->exists($oldname))
        {
            Storage::disk('public')->move($oldname, $newname);
            $this->adjustUserQrCodesImagePaths($user, $oldname);
        }
    }

    public function adjustUserQrCodesImagePaths(User $user, string $oldname)
    {
        dispatch(new AdjustUserQrCodeImagePathJob($user, $oldname));
    }

    public function deleteQrCode(int $id) : bool
    {
        $qrcode = ModelQrCode::findOrFail($id);

        $state = $this->deleteQrCodeFromDb($qrcode) && $this->deleteQrCodeFromStorage($qrcode) ? true : false;

        return $state;
    }
    public function deleteQrCodeFromDb(ModelQrCode $qrcode) : bool
    {
        $state = $qrcode->delete();

        return $state;
    }

    public function deleteQrCodeFromStorage(ModelQrCode $qrcode) : bool
    {
        $state = Storage::disk('public')->delete($qrcode->image_path);

        return $state;
    }
}
