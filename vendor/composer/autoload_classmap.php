<?php

// autoload_classmap.php @generated by Composer

$vendorDir = dirname(dirname(__FILE__));
$baseDir = dirname($vendorDir);

return array(
    'Amp\\CallableMaker' => $vendorDir . '/amphp/amp/lib/CallableMaker.php',
    'Amp\\CancellationToken' => $vendorDir . '/amphp/amp/lib/CancellationToken.php',
    'Amp\\CancellationTokenSource' => $vendorDir . '/amphp/amp/lib/CancellationTokenSource.php',
    'Amp\\CancelledException' => $vendorDir . '/amphp/amp/lib/CancelledException.php',
    'Amp\\CombinedCancellationToken' => $vendorDir . '/amphp/amp/lib/CombinedCancellationToken.php',
    'Amp\\Coroutine' => $vendorDir . '/amphp/amp/lib/Coroutine.php',
    'Amp\\Deferred' => $vendorDir . '/amphp/amp/lib/Deferred.php',
    'Amp\\Delayed' => $vendorDir . '/amphp/amp/lib/Delayed.php',
    'Amp\\Emitter' => $vendorDir . '/amphp/amp/lib/Emitter.php',
    'Amp\\Failure' => $vendorDir . '/amphp/amp/lib/Failure.php',
    'Amp\\Internal\\Placeholder' => $vendorDir . '/amphp/amp/lib/Internal/Placeholder.php',
    'Amp\\Internal\\PrivateIterator' => $vendorDir . '/amphp/amp/lib/Internal/PrivateIterator.php',
    'Amp\\Internal\\PrivatePromise' => $vendorDir . '/amphp/amp/lib/Internal/PrivatePromise.php',
    'Amp\\Internal\\Producer' => $vendorDir . '/amphp/amp/lib/Internal/Producer.php',
    'Amp\\Internal\\ResolutionQueue' => $vendorDir . '/amphp/amp/lib/Internal/ResolutionQueue.php',
    'Amp\\InvalidYieldError' => $vendorDir . '/amphp/amp/lib/InvalidYieldError.php',
    'Amp\\Iterator' => $vendorDir . '/amphp/amp/lib/Iterator.php',
    'Amp\\LazyPromise' => $vendorDir . '/amphp/amp/lib/LazyPromise.php',
    'Amp\\Loop' => $vendorDir . '/amphp/amp/lib/Loop.php',
    'Amp\\Loop\\Driver' => $vendorDir . '/amphp/amp/lib/Loop/Driver.php',
    'Amp\\Loop\\DriverFactory' => $vendorDir . '/amphp/amp/lib/Loop/DriverFactory.php',
    'Amp\\Loop\\EvDriver' => $vendorDir . '/amphp/amp/lib/Loop/EvDriver.php',
    'Amp\\Loop\\EventDriver' => $vendorDir . '/amphp/amp/lib/Loop/EventDriver.php',
    'Amp\\Loop\\Internal\\TimerQueue' => $vendorDir . '/amphp/amp/lib/Loop/Internal/TimerQueue.php',
    'Amp\\Loop\\InvalidWatcherError' => $vendorDir . '/amphp/amp/lib/Loop/InvalidWatcherError.php',
    'Amp\\Loop\\NativeDriver' => $vendorDir . '/amphp/amp/lib/Loop/NativeDriver.php',
    'Amp\\Loop\\TracingDriver' => $vendorDir . '/amphp/amp/lib/Loop/TracingDriver.php',
    'Amp\\Loop\\UnsupportedFeatureException' => $vendorDir . '/amphp/amp/lib/Loop/UnsupportedFeatureException.php',
    'Amp\\Loop\\UvDriver' => $vendorDir . '/amphp/amp/lib/Loop/UvDriver.php',
    'Amp\\Loop\\Watcher' => $vendorDir . '/amphp/amp/lib/Loop/Watcher.php',
    'Amp\\MultiReasonException' => $vendorDir . '/amphp/amp/lib/MultiReasonException.php',
    'Amp\\NullCancellationToken' => $vendorDir . '/amphp/amp/lib/NullCancellationToken.php',
    'Amp\\Postgres\\Connection' => $vendorDir . '/amphp/postgres/src/Connection.php',
    'Amp\\Postgres\\ConnectionConfig' => $vendorDir . '/amphp/postgres/src/ConnectionConfig.php',
    'Amp\\Postgres\\ConnectionListener' => $vendorDir . '/amphp/postgres/src/ConnectionListener.php',
    'Amp\\Postgres\\ConnectionTransaction' => $vendorDir . '/amphp/postgres/src/ConnectionTransaction.php',
    'Amp\\Postgres\\Executor' => $vendorDir . '/amphp/postgres/src/Executor.php',
    'Amp\\Postgres\\Handle' => $vendorDir . '/amphp/postgres/src/Handle.php',
    'Amp\\Postgres\\Internal\\ArrayParser' => $vendorDir . '/amphp/postgres/src/Internal/ArrayParser.php',
    'Amp\\Postgres\\Link' => $vendorDir . '/amphp/postgres/src/Link.php',
    'Amp\\Postgres\\Listener' => $vendorDir . '/amphp/postgres/src/Listener.php',
    'Amp\\Postgres\\Notification' => $vendorDir . '/amphp/postgres/src/Notification.php',
    'Amp\\Postgres\\ParseException' => $vendorDir . '/amphp/postgres/src/ParseException.php',
    'Amp\\Postgres\\PgSqlCommandResult' => $vendorDir . '/amphp/postgres/src/PgSqlCommandResult.php',
    'Amp\\Postgres\\PgSqlConnection' => $vendorDir . '/amphp/postgres/src/PgSqlConnection.php',
    'Amp\\Postgres\\PgSqlHandle' => $vendorDir . '/amphp/postgres/src/PgSqlHandle.php',
    'Amp\\Postgres\\PgSqlResultSet' => $vendorDir . '/amphp/postgres/src/PgSqlResultSet.php',
    'Amp\\Postgres\\PgSqlStatement' => $vendorDir . '/amphp/postgres/src/PgSqlStatement.php',
    'Amp\\Postgres\\Pool' => $vendorDir . '/amphp/postgres/src/Pool.php',
    'Amp\\Postgres\\PooledListener' => $vendorDir . '/amphp/postgres/src/PooledListener.php',
    'Amp\\Postgres\\PooledResultSet' => $vendorDir . '/amphp/postgres/src/PooledResultSet.php',
    'Amp\\Postgres\\PooledStatement' => $vendorDir . '/amphp/postgres/src/PooledStatement.php',
    'Amp\\Postgres\\PooledTransaction' => $vendorDir . '/amphp/postgres/src/PooledTransaction.php',
    'Amp\\Postgres\\PqBufferedResultSet' => $vendorDir . '/amphp/postgres/src/PqBufferedResultSet.php',
    'Amp\\Postgres\\PqCommandResult' => $vendorDir . '/amphp/postgres/src/PqCommandResult.php',
    'Amp\\Postgres\\PqConnection' => $vendorDir . '/amphp/postgres/src/PqConnection.php',
    'Amp\\Postgres\\PqHandle' => $vendorDir . '/amphp/postgres/src/PqHandle.php',
    'Amp\\Postgres\\PqStatement' => $vendorDir . '/amphp/postgres/src/PqStatement.php',
    'Amp\\Postgres\\PqUnbufferedResultSet' => $vendorDir . '/amphp/postgres/src/PqUnbufferedResultSet.php',
    'Amp\\Postgres\\QueryExecutionError' => $vendorDir . '/amphp/postgres/src/QueryExecutionError.php',
    'Amp\\Postgres\\Quoter' => $vendorDir . '/amphp/postgres/src/Quoter.php',
    'Amp\\Postgres\\Receiver' => $vendorDir . '/amphp/postgres/src/Receiver.php',
    'Amp\\Postgres\\ResultSet' => $vendorDir . '/amphp/postgres/src/ResultSet.php',
    'Amp\\Postgres\\StatementPool' => $vendorDir . '/amphp/postgres/src/StatementPool.php',
    'Amp\\Postgres\\TimeoutConnector' => $vendorDir . '/amphp/postgres/src/TimeoutConnector.php',
    'Amp\\Postgres\\Transaction' => $vendorDir . '/amphp/postgres/src/Transaction.php',
    'Amp\\Producer' => $vendorDir . '/amphp/amp/lib/Producer.php',
    'Amp\\Promise' => $vendorDir . '/amphp/amp/lib/Promise.php',
    'Amp\\Sql\\CommandResult' => $vendorDir . '/amphp/sql/src/CommandResult.php',
    'Amp\\Sql\\Common\\ConnectionPool' => $vendorDir . '/amphp/sql-common/src/ConnectionPool.php',
    'Amp\\Sql\\Common\\PooledResultSet' => $vendorDir . '/amphp/sql-common/src/PooledResultSet.php',
    'Amp\\Sql\\Common\\PooledStatement' => $vendorDir . '/amphp/sql-common/src/PooledStatement.php',
    'Amp\\Sql\\Common\\PooledTransaction' => $vendorDir . '/amphp/sql-common/src/PooledTransaction.php',
    'Amp\\Sql\\Common\\RetryConnector' => $vendorDir . '/amphp/sql-common/src/RetryConnector.php',
    'Amp\\Sql\\Common\\StatementPool' => $vendorDir . '/amphp/sql-common/src/StatementPool.php',
    'Amp\\Sql\\ConnectionConfig' => $vendorDir . '/amphp/sql/src/ConnectionConfig.php',
    'Amp\\Sql\\ConnectionException' => $vendorDir . '/amphp/sql/src/ConnectionException.php',
    'Amp\\Sql\\Connector' => $vendorDir . '/amphp/sql/src/Connector.php',
    'Amp\\Sql\\Executor' => $vendorDir . '/amphp/sql/src/Executor.php',
    'Amp\\Sql\\FailureException' => $vendorDir . '/amphp/sql/src/FailureException.php',
    'Amp\\Sql\\Link' => $vendorDir . '/amphp/sql/src/Link.php',
    'Amp\\Sql\\Pool' => $vendorDir . '/amphp/sql/src/Pool.php',
    'Amp\\Sql\\PoolError' => $vendorDir . '/amphp/sql/src/PoolError.php',
    'Amp\\Sql\\QueryError' => $vendorDir . '/amphp/sql/src/QueryError.php',
    'Amp\\Sql\\ResultSet' => $vendorDir . '/amphp/sql/src/ResultSet.php',
    'Amp\\Sql\\Statement' => $vendorDir . '/amphp/sql/src/Statement.php',
    'Amp\\Sql\\Transaction' => $vendorDir . '/amphp/sql/src/Transaction.php',
    'Amp\\Sql\\TransactionError' => $vendorDir . '/amphp/sql/src/TransactionError.php',
    'Amp\\Sql\\TransientResource' => $vendorDir . '/amphp/sql/src/TransientResource.php',
    'Amp\\Struct' => $vendorDir . '/amphp/amp/lib/Struct.php',
    'Amp\\Success' => $vendorDir . '/amphp/amp/lib/Success.php',
    'Amp\\TimeoutCancellationToken' => $vendorDir . '/amphp/amp/lib/TimeoutCancellationToken.php',
    'Amp\\TimeoutException' => $vendorDir . '/amphp/amp/lib/TimeoutException.php',
    'Composer\\InstalledVersions' => $vendorDir . '/composer/InstalledVersions.php',
    'Connections\\DataBase' => $baseDir . '/Connections/DataBase.php',
    'Cookies\\Cookie' => $baseDir . '/Cookies/Cookie.php',
    'Models\\Country' => $baseDir . '/Models/Country.php',
    'Models\\Item' => $baseDir . '/Models/Item.php',
    'Models\\Manufacturer' => $baseDir . '/Models/Manufacturer.php',
    'Models\\User' => $baseDir . '/Models/User.php',
    'Repositories\\AbstractRepository' => $baseDir . '/Repositories/AbstractRepository.php',
    'Repositories\\Items' => $baseDir . '/Repositories/Items.php',
    'Repositories\\Manufacturers' => $baseDir . '/Repositories/Manufacturers.php',
    'Repositories\\Users' => $baseDir . '/Repositories/Users.php',
);
