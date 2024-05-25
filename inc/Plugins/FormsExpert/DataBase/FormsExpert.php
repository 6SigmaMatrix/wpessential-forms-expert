<?php

namespace WPEssential\Plugins\FormsExpert\DataBase;

if ( ! \defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

final class FormsExpert extends Database
{
	public static function constructor ()
	{
		parent::constructor();
		self::table();
	}

	public static function table ()
	{
		global $wpdb;
		$tables = "CREATE TABLE IF NOT EXISTS {$wpdb->prefix}wpe_forms_entries(
			id int AUTO_INCREMENT PRIMARY KEY,
			post_id int DEFAULT NULL COMMENT 'Collecting the post id when your subscribeb.',
			email VARCHAR(100) NOT NULL COMMENT 'Collect the user email address.',
			created_on DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Collect date time.',
			ip_location VARCHAR(150) DEFAULT NULL COMMENT 'User IP address.',
			state VARCHAR(20) DEFAULT NULL COMMENT 'User IP state.',
			continent VARCHAR(50) DEFAULT NULL COMMENT 'Continent name.',
			continentCode VARCHAR(2) DEFAULT NULL COMMENT 'Two-letter continent code.',
			country VARCHAR(50) DEFAULT NULL COMMENT 'Country name.',
			countryCode VARCHAR(2) DEFAULT NULL COMMENT 'Two-letter country code ISO 3166-1 alpha-2.',
			region VARCHAR(20) DEFAULT NULL COMMENT 'Region/state short code (FIPS or ISO).',
			regionName VARCHAR(30) DEFAULT NULL COMMENT 'Region/state.',
			city VARCHAR(50) DEFAULT NULL COMMENT 'City.',
			district VARCHAR(50) DEFAULT NULL COMMENT 'District (subdivision of city).',
			zip VARCHAR(10) DEFAULT NULL COMMENT 'Zipcode.',
			lat VARCHAR(10) DEFAULT NULL COMMENT 'Latitude.',
			`long` VARCHAR(10) DEFAULT NULL COMMENT 'Longitude.',
			timezone VARCHAR(20) DEFAULT NULL COMMENT 'Timezone (tz).',
			offset VARCHAR(5) DEFAULT NULL COMMENT 'Timezone UTC DST offset in seconds.',
			currency VARCHAR(5) DEFAULT NULL COMMENT 'National currency.',
			isp VARCHAR(20) DEFAULT NULL COMMENT 'ISP name.',
			org VARCHAR(20) DEFAULT NULL COMMENT 'Organization name.',
			`as` VARCHAR(50) DEFAULT NULL COMMENT 'AS number and organization, separated by space (RIR). Empty for IP blocks not being announced in BGP tables.',
			asname VARCHAR(50) DEFAULT NULL COMMENT 'AS name (RIR). Empty for IP blocks not being announced in BGP tables.',
			reverse VARCHAR(50) DEFAULT NULL COMMENT 'Reverse DNS of the IP (can delay response).',
			mobile VARCHAR(5) DEFAULT NULL COMMENT 'Mobile (cellular) connection.',
			proxy VARCHAR(5) DEFAULT NULL COMMENT 'Proxy, VPN or Tor exit address.',
			hosting VARCHAR(5) DEFAULT NULL COMMENT 'Hosting, colocated or data center.',
			meta TEXT DEFAULT NULL COMMENT 'Extra fields.'
		) {$wpdb->get_charset_collate()};";
		dbDelta( $tables );
	}
}
