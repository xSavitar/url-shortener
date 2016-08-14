# -*- coding: utf-8 -*-

import flask
from flask import request, render_template, g
from flask import redirect, url_for

app = flask.Flask(__name__)


@app.route('/')
def index():
    """Routes to the home page of the application"""
    return render_template('index.html')

@app.route('/api/shorten')
def shorten_url():
	"""This route does the shortening of the links"""
