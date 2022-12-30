
/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            colors: {
                'cinnabar': '#E64D44'
            },
            fontFamily: {
                'sans': ['Barlow', 'sans-serif'],
            },
        },
        container: {
            center: true,
            padding: '1rem',
        }
    },
    plugins: [],
}
