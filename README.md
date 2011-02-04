# Codeigniter-Migrations Package

## Contributors

* [John Snyder](http://www.snyderplace.com/)
* [Phil Sturgeon](http://philsturgeon.co.uk)
* [webPragmatist](http://www.webPragmatist.com)
* [Spicer Matthews, Cloudmanic Labs, LLC](http://www.cloudmanic.com)

### Based On

[Migrations](http://codeigniter.com/wiki/Migrations/) by Mat'as Montes

## About

An open source utility for CodeIgniter inspired by Ruby on Rails.

The one thing Ruby on Rails has that CodeIgniter does not have built in
is database migrations. That function to keep track of database changes (versions)
and migrate your database to what ever version you need. Migrate up or migrate down.
With this library you can now do this.

## Install

Add the migrations folder to your packages directory, the first usage will create
the table specified in this package's configuration file.  You will need to create
your migrations folder and classes and point to directory in the config file.

The migration files included in this are just examples. You should install them where ever you
point your `$config["migrations_path"]` to.

## Usage

    $this->load->add_package_path(APPPATH.'third_party/migrations/');
    $this->load->library('migrations');
    $this->migrations->set_verbose(TRUE); // echo statements or not
    $this->migrations->version(id); // migrate the database to a particular version
    $this->migrations->latest(); // migrate the database to the latest version
    $this->migrations->install(); // install to the latest version.

The migrate.php controller just shows the use of these functions. If you are going to use it.
comment out the `show_error()` in the construct, and put it back in place when you are done or
disable it in the configuration file.

## Examples

### Make sure our database is up-to-date

    if ( ! $this->migrations->latest())
    {
    	$error = $this->migrations->get_error();
    	show_error($error);
    }

### Update (or come back to) migration 5

    if ( ! $this->migrations->version(5))
    {
    	$error = $this->migrations->get_error();
    	show_error($error);
    }

## Removal

Run $this->migrations_model->uninstall() or simply drop the table it added and remove the
migrations package and the migrations directory/files you added.