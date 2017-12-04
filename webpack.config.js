var webpack = require('webpack');

module.exports = {
    entry: './src/js',
    output: {
        path: __dirname + '/prod/js',
        filename: 'bundle.js',
    },
    module: {
        loaders: [
            {
                test: /\.js/,
                loader: 'babel-loader',
                //include: __dirname + '/src/js',
                exclude: /(node_modules|bower_components)/,
            }
        ]
    },
    plugins: [
        new webpack.ProvidePlugin({
            $: "jquery",
            jQuery: "jquery",
            'window.jQuery': "jquery"
        }),
        //new webpack.optimize.UglifyJsPlugin({
        //    minimize: true,
        //    extractComments: true,
        //})
    ]
};