<?php
/**
 * Factory Test
 *
 * @author    Pronamic <info@pronamic.eu>
 * @copyright 2005-2022 Pronamic
 * @license   GPL-3.0-or-later
 * @package   Pronamic\WordPress\Pay\Payments
 */

namespace Pronamic\WordPress\Http;

use Pronamic\WordPress\Http\Facades\Http;

/**
 * Factory Test
 *
 * @author  Remco Tolsma
 * @version 1.0.0
 * @since   1.0.0
 */
class FactoryTest extends \WP_UnitTestCase {
	/**
	 * Test fake.
	 */
	public function test_response() {
		$url = 'https://www.pronamic.nl/wp-json/wp/v2/types/post';

		Http::fake( $url, __DIR__ . '/../http/pronamic-nl-wp-json-types-post.http' );

		$response = Http::get( $url );

		$this->assertEquals( 'OK', $response->message() );
		$this->assertEquals( 200, $response->status() );
		$this->assertIsString( $response->body() );
		$this->assertIsObject( $response->json() );
	}
}
