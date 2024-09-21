/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            colors: {
                dgreen: "#114232",
                grass: "#87A922",
                ylow: "#FCDC2A",
            },
            backgroundColor: {
                dgreen: "#114232",
                grass: "#87A922",
                ylow: "#FCDC2A",
                ijo: "#0E5E24",
            },
            fontSize: {
                "10xl": "11rem",
            },
            fontSize: {
                "10xl": "11rem",
            },
            fontFamily: {
                poppins: ["Poppins", "sans-serif"],
                righteous: ["Righteous", "sans-serif"],
            },
        },
    },
    plugins: [],
};
