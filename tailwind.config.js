const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.{vue,js,ts,jsx,tsx}",
        "./node_modules/flowbite/**/*.js"
    ],
    purge: [
        "./resources/**/*.blade.php",
        "./resources/**/*.{vue,js,ts,jsx,tsx}",
        "./node_modules/flowbite/**/*.js"
    ],
    darkMode: "class",
    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [
      require('flowbite/plugin')
    ],
};