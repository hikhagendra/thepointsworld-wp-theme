const path = require('path');

module.exports = {
    mode: 'development',
    entry: [
        './src/scripts/index.js',
        './src/scripts/reviews.js',
        './src/scripts/slider.js'
    ],
    output: {
        filename: 'bundle.js',
        path: path.resolve(__dirname, 'dist'),
    },
};