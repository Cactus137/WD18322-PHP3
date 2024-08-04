/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./node_modules/flowbite/**/*.js",
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    darkMode: "class",
    theme: {
        extend: {
            colors: {
                gray: {
                    50: "#f8f8f8",
                    100: "#efefef",
                    200: "#cccccc",
                    300: "#b6b6b6",
                    400: "#d9d9d9",
                    500: "#7d7d7d",
                    600: "#686465",
                    700: "#4d4948",
                    800: "#323232",
                    900: "#1c1c1c",
                },
            },
            backgroundOpacity: ["dark"],
        },
        fontFamily: {
            sans: ["Roboto", "sans-serif"],
        },
    },
    plugins: [
        require("flowbite/plugin"), 
    ],
};
