<?php
/**
 * Tao Authorization service ensures a test-taker is authorized
 * to start and/or resume a test
 * 
 * By default implemented by AuthorizationAggregator
 * allowing multiple AuthorizationProviders to be verified
 */

return new oat\taoDelivery\model\authorization\strategy\AuthorizationAggregator(array(
    'providers' => array(
        new oat\taoDelivery\model\authorization\strategy\StateValidation()
    )
));
