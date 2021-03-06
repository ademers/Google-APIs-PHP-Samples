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
// Unofficial sample for the genomics v1 API for PHP. 
// This sample is designed to be used with the Google PHP client library. (https://github.com/google/google-api-php-client)
// 
// API Description: Upload, process, query, and search Genomics data in the cloud.
// API Documentation Link https://cloud.google.com/genomics
//
// Discovery Doc  https://www.googleapis.com/discovery/v1/apis/genomics/v1/rest
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
* $service = new Google_Service_Genomics($client); 
****************************************************/

// Option paramaters can be set as needed.
 $optParams = array(
            
  //'end' => '[YourValue]',  // The end position of the range on the reference, 0-based exclusive. Ifspecified, `referenceName` must also be specified. If unset or 0, defaultsto the length of the reference.
            
  //'pageToken' => '[YourValue]',  // The continuation token, which is used to page through large result sets.To get the next page of results, set this parameter to the value of`nextPageToken` from the previous response.
            
  //'pageSize' => '[YourValue]',  // The maximum number of results to return in a single page. If unspecified,defaults to 1024. The maximum value is 2048.
            
  //'start' => '[YourValue]',  // The start position of the range on the reference, 0-based inclusive. Ifspecified, `referenceName` must also be specified. Defaults to 0.
            
  //'targetBucketWidth' => '[YourValue]',  // The desired width of each reported coverage bucket in base pairs. Thiswill be rounded down to the nearest precomputed bucket width; the valueof which is returned as `bucketWidth` in the response. Defaultsto infinity (each bucket spans an entire reference sequence) or the lengthof the target range, if specified. The smallest precomputed`bucketWidth` is currently 2048 base pairs; this is subject tochange.
            
  //'referenceName' => '[YourValue]',  // The name of the reference to query, within the reference set associatedwith this query. Optional.
  'fields' => '*'
);
// Single Request.
$results = coveragebucketsListExample($service, $readGroupSetId, $optParams);

// Paginiation Example
do {
    if (!$results->getNextPageToken()) 
		break;

	$optParams['pageToken'] = $results->getNextPageToken();
	$results = filesListExample($service, $readGroupSetId, $optParams);	
} while($results->getNextPageToken());  

/**
* Lists fixed width coverage buckets for a read group set, each of whichcorrespond to a range of a reference sequence. Each bucket summarizescoverage information across its corresponding genomic range.For the definitions of read group sets and other genomics resources, see[Fundamentals of GoogleGenomics](https://cloud.google.com/genomics/fundamentals-of-google-genomics)Coverage is defined as the number of reads which are aligned to a givenbase in the reference sequence. Coverage buckets are available at severalprecomputed bucket widths, enabling retrieval of various coverage 'zoomlevels'. The caller must have READ permissions for the target read groupset.
* @service Authenticated Genomics service.
* @optParams Optional paramaters are not required by a request.
* @readGroupSetId Required. The ID of the read group set over which coverage is requested.
* @return ListCoverageBucketsResponse
*/
function coveragebucketsListExample($service, $readGroupSetId, $optParams)
{
	try
	{
		// Parameter validation.
		if ($service == null)
			throw new Exception("service is required.");
		if ($optParams == null)
			throw new Exception("optParams is required.");
		if (readGroupSetId == null)
			throw new Exception("readGroupSetId is required.");
		// Make the request and return the results.
		return $service->coveragebuckets->ListCoveragebuckets($readGroupSetId, $optParams);
	}
	catch (Exception $e)
	{
		print "An error occurred: " . $e->getMessage();
	}
}
?>
