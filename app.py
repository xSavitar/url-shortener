# -*- coding: utf-8 -*-

from url-shortener import app

if __name__ == '__main__':
	app.debug = True
	app.run(debug=True)
