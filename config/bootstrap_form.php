<?php
return [
  'button' => '<button{{attrs}} class="btn btn-default">{{text}}</button>',
	'checkbox' => '<input type="checkbox" name="{{name}}" value="{{value}}"{{attrs}}>',
	'checkboxFormGroup' => '<label>{{input}} {{label}}</label>',
	'checkboxWrapper' => '<div class="checkbox">{{input}}{{label}}</div>',
	'dateWidget' => '{{year}}{{month}}{{day}}{{hour}}{{minute}}{{second}}{{meridian}}',
	//'error' => '<div class="error-message">{{content}}</div>',
  'error' => '<div class="help-block">{{content}}</div>',
	'errorList' => '<ul>{{content}}</ul>',
	'errorItem' => '<li>{{text}}</li>',
	'file' => '<input type="file" name="{{name}}"{{attrs}}>',
	'fieldset' => '<fieldset>{{content}}</fieldset>',
	'formstart' => '<form{{attrs}}>',
	'formend' => '</form>',
	'formGroup' => '{{label}}{{input}}',
	'hiddenblock' => '<div style="display:none;">{{content}}</div>',
	'input' => '<input class="form-control" type="{{type}}" name="{{name}}"{{attrs}}>',
	'inputSubmit' => '<input type="{{type}}"{{attrs}}>',
	'inputContainer' => '<div class="form-group {{type}}{{required}}">{{content}}</div>',
	'inputContainerError' => '<div class="form-group {{type}}{{required}} has-error">{{content}}{{error}}</div>',
	'label' => '<label{{attrs}}>{{text}}</label>',
	'legend' => '<legend>{{text}}</legend>',
	'option' => '<option value="{{value}}"{{attrs}}>{{text}}</option>',
	'optgroup' => '<optgroup label="{{label}}"{{attrs}}>{{content}}</optgroup>',
	'select' => '<select class="form-control" name="{{name}}"{{attrs}}>{{content}}</select>',
	'selectMultiple' => '<select class="form-control" name="{{name}}[]" multiple="multiple"{{attrs}}>{{content}}</select>',
	'radio' => '<input type="radio" name="{{name}}" value="{{value}}"{{attrs}}>',
	'radioWrapper' => '<div class="radio"><label>{{input}} {{label}}</label></div>',
	'textarea' => '<textarea class="form-control" name="{{name}}"{{attrs}}>{{value}}</textarea>',
	'submitContainer' => '<div class="submit">{{content}}</div>',
];
