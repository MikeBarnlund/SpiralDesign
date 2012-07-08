# Require any additional compass plugins here.

# Set this to the root of your project when deployed:
http_path = "/"
css_dir = "website/wp-content/themes/sd/assets/css"
sass_dir = "sass"
images_dir = "website/wp-content/themes/sd/assets/img"
javascripts_dir = "website/wp-content/themes/sd/assets/js"

# MB - Sass will look in the local directory for imports first, then check anything
# on the import path
# add_import_path "../../../Base/sass"

# You can select your preferred output style here (can be overridden via the command line):
# output_style = :expanded or :nested or :compact or :compressed
output_style = :compressed

# To enable relative paths to assets via compass helper functions. Uncomment:
# relative_assets = true

# To disable debugging comments that display the original location of your selectors. Uncomment:
line_comments = false

# If you prefer the indented syntax, you might want to regenerate this
# project again passing --syntax sass, or you can uncomment this:
# preferred_syntax = :sass
# and then run:
# sass-convert -R --from scss --to sass sass scss && rm -rf sass && mv scss sass