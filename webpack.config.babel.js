import 'babel-polyfill'
import path from 'path'
import ExtractTextPlugin from 'extract-text-webpack-plugin'
import CopyWebpackPlugin from 'copy-webpack-plugin'
import autoprefixer from 'autoprefixer'
const production = process.argv.includes('-p')
const src = path.join(__dirname, 'src/')
const dist = path.join(__dirname, 'wp-content/themes/{{theme_dir}}/')
const scriptsDir = 'assets/scripts/'
const stylesDir = 'assets/styles/'

export default {
  entry: {
    build: [
      src + scriptsDir + 'index.js',
      src + stylesDir + 'index.scss'
    ],
    editor: [
      src + stylesDir + 'editor.scss'
    ]
  },
  output: {
    path: dist,
    filename: scriptsDir + '[name].js',
    publicPath: '../../'
  },
  resolve: {
    extensions: [
      '',
      '.js',
      '.json',
      '.scss'
    ]
  },
  module: {
    loaders: [
      {
        test: /\.json$/,
        loader: 'json-loader'
      },
      {
        test: /\.js$/,
        loader: 'babel-loader',
        include: src
      },
      {
        test: /\.scss$/,
        loader: ExtractTextPlugin.extract('style-loader', 'css!postcss!sass')
      },
      {
        test: /\.(ico|jpe?g|png|gif|svg|webm|mp4)$/,
        loader: 'file-loader?name=[path][name].[ext]&context='+src+'/',
      },
      {
        test: /\.(woff|woff2|ttf|otf|eot|eot\?#.+)$/,
        loader: 'file?name=[path][name].[ext]&context='+src+'/',
      }
    ],
  },
  postcss: function plugins() {
    return [
      autoprefixer({
        browsers: [
          'Android 2.3',
          'Android >= 4',
          'Chrome >= 35',
          'Firefox >= 31',
          'Explorer >= 9',
          'iOS >= 7',
          'Opera >= 12',
          'Safari >= 7.1'
        ]
      })
    ]
  },
  plugins: [
    new ExtractTextPlugin(stylesDir + '[name].css'),
    new CopyWebpackPlugin([
      {
        from: src,
        to: dist,
        ignore: [
          '*.js',
          '*.scss'
        ]
      }
    ])
  ]
}