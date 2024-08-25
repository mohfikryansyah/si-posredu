import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./node_modules/flowbite/**/*.js"
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
                sanspro : ['Source Sans Pro', 'sans-serif'],
                poppins: ['Poppins', 'sans-serif'],
                abyssinica: ['Abyssinica SIL', 'serif'],
                akshar: ['Akshar', 'sans-serif'],
                nunito: ['Nunito'],
                inter: ['Inter', 'sans-serif'],
            },
            keyframes: {
                bounce: {
                    '50%': { transform: 'translateY(0)' },
                    '0%, 100%': { transform: 'translateY(-6%)' }
                }
            },
            animation: {
                bounce: 'bounce 3s ease infinite'
            }
        },
    },

    plugins: [
        forms,
        require('flowbite/plugin')
    ],
};
