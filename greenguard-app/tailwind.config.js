/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./node_modules/flowbite/**/*.js",
        "./resources/**/*.vue",
        "./src/**/*.{html,js}"
    ],
    theme: {
        extend: {},
    },
    plugins: [require("flowbite/plugin")],
};
