<?php

// Disable XML-RPC Pingback methods
add_filter( 'xmlrpc_methods', 'ut_block_xmlrpc' );
function ut_block_xmlrpc( $methods ) {
   unset( $methods['pingback.ping'] );
   unset( $methods['pingback.extensions.getPingbacks'] );
   unset( $methods['wp.getUsersBlogs'] ); // New method used by attackers to perform brute force discovery of existing users
   return $methods;
}
