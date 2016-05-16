var prompt = require('prompt');
var fs = require('fs')
var schema = {
  properties: {
    url: {
      description: "Website URL",
      pattern: /^http/,
      message: 'Starting with http://',
      required: true
    },
    theme_dir: {
      description: "Theme Directory Name",
      required: true
    },
    db_host: {
      description: "DB Host",
      required: true
    },
    db_name: {
      description: "DB Name",
      required: true
    },
    db_user: {
      description: "DB User",
      required: true
    },
    db_pass: {
      description: "DB Pass",
      hidden: true
    }
  }
};
prompt.start();
prompt.get(schema, function (err, result) {
  fs.readFile('wp-config.php', 'utf8', function (err, data) {
    if (err) {
      return console.log(err);
    }
    var output = data.replace(/{{url}}/g, result.url);
        output = output.replace(/{{db_host}}/g, result.db_host);
        output = output.replace(/{{db_name}}/g, result.db_name);
        output = output.replace(/{{db_user}}/g, result.db_user);
        output = output.replace(/{{db_pass}}/g, result.db_pass);

    fs.writeFile('wp-config.php', output, 'utf8', function (err) {
       if (err) return console.log(err);
    });
  });
  fs.readFile('webpack.config.babel.js', 'utf8', function (err, data) {
    if (err) {
      return console.log(err);
    }
    var output = data.replace(/{{theme_dir}}/g, result.theme_dir);

    fs.writeFile('webpack.config.babel.js', output, 'utf8', function (err) {
       if (err) return console.log(err);
    });
  });
});