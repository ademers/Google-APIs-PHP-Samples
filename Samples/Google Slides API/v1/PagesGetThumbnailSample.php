﻿<?php
// Copyright 2017 DAIMTO ([Linda Lawton](https://twitter.com/LindaLawtonDK)) :  [www.daimto.com](http://www.daimto.com/)
//
// Licensed under the Apache License, Version 2.0 (the "License"); you may not use this file except in compliance with
// the License. You may obtain a copy of the License at
//
// http://www.apache.org/licenses/LICENSE-2.0
//
// Unless required by applicable law or agreed to in writing, software distributed under the License is distributed on
// an "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the License for the
// specific language governing permissions and limitations under the License.
//------------------------------------------------------------------------------
// <auto-generated>
//     This code was generated by DAIMTO-Google-apis-Sample-generator 1.0.0
//     Template File Name:  methodTemplate.tt
//     Build date: 2017-10-08
//     PHP generator version: 1.0.0
//     
//     Changes to this file may cause incorrect behavior and will be lost if
//     the code is regenerated.
// </auto-generated>
//------------------------------------------------------------------------------  
// About 
// 
// Unofficial sample for the Slides v1 API for PHP. 
// This sample is designed to be used with the Google PHP client library. (https://github.com/google/google-api-php-client)
// 
// API Description: An API for creating and editing Google Slides presentations.
// API Documentation Link https://developers.google.com/slides/
//
// Discovery Doc  https://www.googleapis.com/discovery/v1/apis/slides/v1/rest
//
//------------------------------------------------------------------------------
// Installation
//
// The preferred method is via https://getcomposer.org. Follow the installation instructions https://getcomposer.org/doc/00-intro.md 
// if you do not already have composer installed.
//
// Once composer is installed, execute the following command in your project root to install this library:
//
// composer require google/apiclient:^2.0
//
//------------------------------------------------------------------------------  
// Load the Google API PHP Client Library.
require_once __DIR__ . '/vendor/autoload.php';
session_start();

/***************************************************
* Include this line for service account authencation.  Note: Not all APIs support service accounts.  
//require_once __DIR__ . '/ServiceAccount.php';     
* Include the following four lines Oauth2 authencation.
* require_once __DIR__ . '/Oauth2Authentication.php';
* $_SESSION['mainScript'] = basename($_SERVER['PHP_SELF']);   // Oauth2callback.php will return here.
* $client = getGoogleClient();
* $service = new Google_Service_Slides($client); 
****************************************************/

// Option paramaters can be set as needed.
 $optParams = array(
            
  //'thumbnailProperties.thumbnailSize' => '[YourValue]',  // The optional thumbnail image size.If you don't specify the size, the server chooses a default size of theimage.
            
  //'thumbnailProperties.mimeType' => '[YourValue]',  // The optional mime type of the thumbnail image.If you don't specify the mime type, the default mime type will be PNG.
  'fields' => '*'
);
// Single Request.
$results = pagesGetThumbnailExample($service, $presentationId, $pageObjectId, $optParams);


/**
* Generates a thumbnail of the latest version of the specified page in thepresentation and returns a URL to the thumbnail image.
* @service Authenticated Slides service.
* @optParams Optional paramaters are not required by a request.
* @pageObjectId The object ID of the page whose thumbnail to retrieve.
* @presentationId The ID of the presentation to retrieve.
* @return Thumbnail
*/
function pagesGetThumbnailExample($service, $presentationId, $pageObjectId, $optParams)
{
	try
	{
		// Parameter validation.
		if ($service == null)
			throw new Exception("service is required.");
		if ($optParams == null)
			throw new Exception("optParams is required.");
		if (pageObjectId == null)
			throw new Exception("pageObjectId is required.");
		if (presentationId == null)
			throw new Exception("presentationId is required.");
		// Make the request and return the results.
		return $service->pages->GetThumbnailPages($presentationId, $pageObjectId, $optParams);
	}
	catch (Exception $e)
	{
		print "An error occurred: " . $e->getMessage();
	}
}
?>
