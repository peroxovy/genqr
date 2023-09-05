/** @type {import('tailwindcss').Config} */
export default {
    purge: {
        content: [
          './vendor/wire-elements/modal/resources/views/*.blade.php',
          './vendor/wire-elements/modal/src/ModalComponent.php',
          './storage/framework/views/*.php',
          './resources/views/**/*.blade.php',
        ],
        options: {
          safelist: [
            'sm:max-w-2xl'
          ]
        }
      },
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
      ],
  theme: {
    // screens: {
    //     'mobile' : '340px',
    //     'tablet' : '440px',
    //     'md' : '640px',
    //     'laptop' : '1024px',
    //     'desktop' : '1280px'
    // },

    extend: {
        animation: {
            blob: "blob 7s infinite",
          },
          keyframes: {
            blob: {
              "0%": {
                transform: "translate(0px, 0px) scale(1)",
              },
              "33%": {
                transform: "translate(30px, -50px) scale(1.1)",
              },
              "66%": {
                transform: "translate(-20px, 20px) scale(0.9)",
              },
              "100%": {
                transform: "tranlate(0px, 0px) scale(1)",
              },
            },
          },
    },
  },
  plugins: [],

}

