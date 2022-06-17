const defaultConfig = require('@wordpress/scripts/config/webpack.config');
const path = require('path');
const { CleanWebpackPlugin } = require('clean-webpack-plugin');
const isProduction = process.env.NODE_ENV === 'production';

sharedConfig = {
  ...defaultConfig,
  externals: {
    react: 'React',
    'react-dom': 'ReactDOM'
  },
  module: {
    ...defaultConfig.module,
    rules: [...defaultConfig.module.rules]
  },
  plugins: [...defaultConfig.plugins]
};

module.exports = [
  {
    ...sharedConfig,
    entry: {
      'base-fse-admin': ['./src/public-path.js', './src/js/admin.js']
    },
    output: {
      // `filename` provides a template for naming your bundles (remember to use `[name]`)
      filename: '[name].min.js',
      // `chunkFilename` provides a template for naming code-split bundles (optional)
      chunkFilename: 'chunk/[name].[chunkhash].min.js',
      // `path` is the folder where Webpack will place your bundles
      path: path.resolve(__dirname, 'base-fse/assets/admin/build')
      // `publicPath` is where Webpack will load your bundles from (optional)
    },
    plugins: [...sharedConfig.plugins, new CleanWebpackPlugin()]
  },
  {
    ...sharedConfig,
    entry: {
      'base-fse-frontend': ['./src/public-path.js', './src/js/frontend.js']
    },
    output: {
      // `filename` provides a template for naming your bundles (remember to use `[name]`)
      filename: '[name].min.js',
      // `chunkFilename` provides a template for naming code-split bundles (optional)
      chunkFilename: 'chunk/[name].[chunkhash].min.js',
      // `path` is the folder where Webpack will place your bundles
      path: path.resolve(__dirname, 'base-fse/assets/frontend/build')
      // `publicPath` is where Webpack will load your bundles from (optional)
    },
    plugins: [...sharedConfig.plugins, new CleanWebpackPlugin()]
  },
  {
    // needed as CleanWebPackPlugin has a bug in multi-compiling
    ...sharedConfig,
    entry: {
      temp: './src/temp/index.js'
      //main: ["./src/js/index.js", "./src/css/frontend.scss"]
    },
    output: {
      // `filename` provides a template for naming your bundles (remember to use `[name]`)
      filename: '[name].min.js',
      // `chunkFilename` provides a template for naming code-split bundles (optional)
      chunkFilename: 'chunk/[name].[chunkhash].min.js',
      // `path` is the folder where Webpack will place your bundles
      path: path.resolve(__dirname, 'temp/dist')
      // `publicPath` is where Webpack will load your bundles from (optional)
    },
    plugins: [...sharedConfig.plugins, new CleanWebpackPlugin()]
  }
];
