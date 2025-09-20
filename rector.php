<?php

declare(strict_types=1);

use Rector\Caching\ValueObject\Storage\FileCacheStorage;
use Rector\Config\RectorConfig;
use Rector\Php83\Rector\ClassMethod\AddOverrideAttributeToOverriddenMethodsRector;

return RectorConfig::configure()
    ->withCache(
        cacheDirectory: '/tmp/rector',
        cacheClass: FileCacheStorage::class,
    )
    ->withPaths([
        __DIR__.'/config',
        __DIR__.'/src',
        __DIR__.'/tests',
    ])
    ->withSkip([
        AddOverrideAttributeToOverriddenMethodsRector::class,
    ])
    ->withPreparedSets(
        deadCode: true,
        codeQuality: true,
        typeDeclarations: true,
        privatization: true,
        earlyReturn: true,
        strictBooleans: true,
    )
    ->withPhpSets(true);
