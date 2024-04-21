import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';

/** @type {import('tailwindcss').Config} */
export default {
    darkMode: "false",

    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        container: {
            center: true,
            padding: "2rem",
            screens: {
                "2xl": "1400px",
            },
        },
        extend: {
            fontFamily: {
                sans: ['Roboto Slab', ...defaultTheme.fontFamily.serif],
                inter: ["Inter", ...defaultTheme.fontFamily.sans],
            },
            colors: {
                background: "#fbeee5",
                foreground: "#775e58",
                "dark-background": "#e1d1c9",
                primary: {
                    DEFAULT: "#a88d86",
                    foreground: "#ffffff",
                },
            }
        },
    },

    plugins: [forms, typography],
};
