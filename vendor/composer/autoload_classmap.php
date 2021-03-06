<?php

// autoload_classmap.php @generated by Composer

$vendorDir = dirname(dirname(__FILE__));
$baseDir = dirname($vendorDir);

return array(
    'Attribute' => $vendorDir . '/symfony/polyfill-php80/Resources/stubs/Attribute.php',
    'Comparator\\ColumnComparator' => $vendorDir . '/lulco/phoenix/src/Comparator/ColumnComparator.php',
    'Comparator\\SettingsComparator' => $vendorDir . '/lulco/phoenix/src/Comparator/SettingsComparator.php',
    'Comparator\\StructureComparator' => $vendorDir . '/lulco/phoenix/src/Comparator/StructureComparator.php',
    'Comparator\\TableComparator' => $vendorDir . '/lulco/phoenix/src/Comparator/TableComparator.php',
    'Composer\\InstalledVersions' => $vendorDir . '/composer/InstalledVersions.php',
    'Dompdf\\Cpdf' => $vendorDir . '/dompdf/dompdf/lib/Cpdf.php',
    'Dumper\\Dumper' => $vendorDir . '/lulco/phoenix/src/Dumper/Dumper.php',
    'Dumper\\Indenter' => $vendorDir . '/lulco/phoenix/src/Dumper/Indenter.php',
    'EasyPeasyICS' => $vendorDir . '/phpmailer/phpmailer/extras/EasyPeasyICS.php',
    'HTML5_Data' => $vendorDir . '/dompdf/dompdf/lib/html5lib/Data.php',
    'HTML5_InputStream' => $vendorDir . '/dompdf/dompdf/lib/html5lib/InputStream.php',
    'HTML5_Parser' => $vendorDir . '/dompdf/dompdf/lib/html5lib/Parser.php',
    'HTML5_Tokenizer' => $vendorDir . '/dompdf/dompdf/lib/html5lib/Tokenizer.php',
    'HTML5_TreeBuilder' => $vendorDir . '/dompdf/dompdf/lib/html5lib/TreeBuilder.php',
    'JsonException' => $vendorDir . '/symfony/polyfill-php73/Resources/stubs/JsonException.php',
    'Normalizer' => $vendorDir . '/symfony/polyfill-intl-normalizer/Resources/stubs/Normalizer.php',
    'PHPMailer' => $vendorDir . '/phpmailer/phpmailer/class.phpmailer.php',
    'PHPMailerOAuth' => $vendorDir . '/phpmailer/phpmailer/class.phpmaileroauth.php',
    'PHPMailerOAuthGoogle' => $vendorDir . '/phpmailer/phpmailer/class.phpmaileroauthgoogle.php',
    'POP3' => $vendorDir . '/phpmailer/phpmailer/class.pop3.php',
    'Phoenix\\Behavior\\ParamsCheckerBehavior' => $vendorDir . '/lulco/phoenix/src/Behavior/ParamsCheckerBehavior.php',
    'Phoenix\\Command\\AbstractCommand' => $vendorDir . '/lulco/phoenix/src/Command/AbstractCommand.php',
    'Phoenix\\Command\\AbstractDumpCommand' => $vendorDir . '/lulco/phoenix/src/Command/AbstractDumpCommand.php',
    'Phoenix\\Command\\AbstractRunCommand' => $vendorDir . '/lulco/phoenix/src/Command/AbstractRunCommand.php',
    'Phoenix\\Command\\CleanupCommand' => $vendorDir . '/lulco/phoenix/src/Command/CleanupCommand.php',
    'Phoenix\\Command\\CreateCommand' => $vendorDir . '/lulco/phoenix/src/Command/CreateCommand.php',
    'Phoenix\\Command\\DiffCommand' => $vendorDir . '/lulco/phoenix/src/Command/DiffCommand.php',
    'Phoenix\\Command\\DumpCommand' => $vendorDir . '/lulco/phoenix/src/Command/DumpCommand.php',
    'Phoenix\\Command\\InitCommand' => $vendorDir . '/lulco/phoenix/src/Command/InitCommand.php',
    'Phoenix\\Command\\MigrateCommand' => $vendorDir . '/lulco/phoenix/src/Command/MigrateCommand.php',
    'Phoenix\\Command\\RollbackCommand' => $vendorDir . '/lulco/phoenix/src/Command/RollbackCommand.php',
    'Phoenix\\Command\\StatusCommand' => $vendorDir . '/lulco/phoenix/src/Command/StatusCommand.php',
    'Phoenix\\Command\\TestCommand' => $vendorDir . '/lulco/phoenix/src/Command/TestCommand.php',
    'Phoenix\\Config\\Config' => $vendorDir . '/lulco/phoenix/src/Config/Config.php',
    'Phoenix\\Config\\EnvironmentConfig' => $vendorDir . '/lulco/phoenix/src/Config/EnvironmentConfig.php',
    'Phoenix\\Config\\Parser\\ConfigParserFactory' => $vendorDir . '/lulco/phoenix/src/Config/Parser/ConfigParserFactory.php',
    'Phoenix\\Config\\Parser\\ConfigParserInterface' => $vendorDir . '/lulco/phoenix/src/Config/Parser/ConfigParserInterface.php',
    'Phoenix\\Config\\Parser\\JsonConfigParser' => $vendorDir . '/lulco/phoenix/src/Config/Parser/JsonConfigParser.php',
    'Phoenix\\Config\\Parser\\NeonConfigParser' => $vendorDir . '/lulco/phoenix/src/Config/Parser/NeonConfigParser.php',
    'Phoenix\\Config\\Parser\\PhpConfigParser' => $vendorDir . '/lulco/phoenix/src/Config/Parser/PhpConfigParser.php',
    'Phoenix\\Config\\Parser\\YamlConfigParser' => $vendorDir . '/lulco/phoenix/src/Config/Parser/YamlConfigParser.php',
    'Phoenix\\Database\\Adapter\\AdapterFactory' => $vendorDir . '/lulco/phoenix/src/Database/Adapter/AdapterFactory.php',
    'Phoenix\\Database\\Adapter\\AdapterInterface' => $vendorDir . '/lulco/phoenix/src/Database/Adapter/AdapterInterface.php',
    'Phoenix\\Database\\Adapter\\Behavior\\StructureBehavior' => $vendorDir . '/lulco/phoenix/src/Database/Adapter/Behavior/StructureBehavior.php',
    'Phoenix\\Database\\Adapter\\MysqlAdapter' => $vendorDir . '/lulco/phoenix/src/Database/Adapter/MysqlAdapter.php',
    'Phoenix\\Database\\Adapter\\PdoAdapter' => $vendorDir . '/lulco/phoenix/src/Database/Adapter/PdoAdapter.php',
    'Phoenix\\Database\\Adapter\\PgsqlAdapter' => $vendorDir . '/lulco/phoenix/src/Database/Adapter/PgsqlAdapter.php',
    'Phoenix\\Database\\Element\\Behavior\\AutoIncrementBehavior' => $vendorDir . '/lulco/phoenix/src/Database/Element/Behavior/AutoIncrementBehavior.php',
    'Phoenix\\Database\\Element\\Behavior\\CharsetAndCollationBehavior' => $vendorDir . '/lulco/phoenix/src/Database/Element/Behavior/CharsetAndCollationBehavior.php',
    'Phoenix\\Database\\Element\\Behavior\\ColumnsToChangeBehavior' => $vendorDir . '/lulco/phoenix/src/Database/Element/Behavior/ColumnsToChangeBehavior.php',
    'Phoenix\\Database\\Element\\Behavior\\ColumnsToDropBehavior' => $vendorDir . '/lulco/phoenix/src/Database/Element/Behavior/ColumnsToDropBehavior.php',
    'Phoenix\\Database\\Element\\Behavior\\ColumnsToRenameBehavior' => $vendorDir . '/lulco/phoenix/src/Database/Element/Behavior/ColumnsToRenameBehavior.php',
    'Phoenix\\Database\\Element\\Behavior\\CommentBehavior' => $vendorDir . '/lulco/phoenix/src/Database/Element/Behavior/CommentBehavior.php',
    'Phoenix\\Database\\Element\\Behavior\\CopyTableBehavior' => $vendorDir . '/lulco/phoenix/src/Database/Element/Behavior/CopyTableBehavior.php',
    'Phoenix\\Database\\Element\\Behavior\\DropPrimaryKeyBehavior' => $vendorDir . '/lulco/phoenix/src/Database/Element/Behavior/DropPrimaryKeyBehavior.php',
    'Phoenix\\Database\\Element\\Behavior\\ForeignKeyBehavior' => $vendorDir . '/lulco/phoenix/src/Database/Element/Behavior/ForeignKeyBehavior.php',
    'Phoenix\\Database\\Element\\Behavior\\IndexBehavior' => $vendorDir . '/lulco/phoenix/src/Database/Element/Behavior/IndexBehavior.php',
    'Phoenix\\Database\\Element\\Behavior\\PrimaryColumnsBehavior' => $vendorDir . '/lulco/phoenix/src/Database/Element/Behavior/PrimaryColumnsBehavior.php',
    'Phoenix\\Database\\Element\\Column' => $vendorDir . '/lulco/phoenix/src/Database/Element/Column.php',
    'Phoenix\\Database\\Element\\ColumnSettings' => $vendorDir . '/lulco/phoenix/src/Database/Element/ColumnSettings.php',
    'Phoenix\\Database\\Element\\ForeignKey' => $vendorDir . '/lulco/phoenix/src/Database/Element/ForeignKey.php',
    'Phoenix\\Database\\Element\\Index' => $vendorDir . '/lulco/phoenix/src/Database/Element/Index.php',
    'Phoenix\\Database\\Element\\IndexColumn' => $vendorDir . '/lulco/phoenix/src/Database/Element/IndexColumn.php',
    'Phoenix\\Database\\Element\\IndexColumnSettings' => $vendorDir . '/lulco/phoenix/src/Database/Element/IndexColumnSettings.php',
    'Phoenix\\Database\\Element\\MigrationTable' => $vendorDir . '/lulco/phoenix/src/Database/Element/MigrationTable.php',
    'Phoenix\\Database\\Element\\Structure' => $vendorDir . '/lulco/phoenix/src/Database/Element/Structure.php',
    'Phoenix\\Database\\Element\\Table' => $vendorDir . '/lulco/phoenix/src/Database/Element/Table.php',
    'Phoenix\\Database\\QueryBuilder\\CommonQueryBuilder' => $vendorDir . '/lulco/phoenix/src/Database/QueryBuilder/CommonQueryBuilder.php',
    'Phoenix\\Database\\QueryBuilder\\MysqlQueryBuilder' => $vendorDir . '/lulco/phoenix/src/Database/QueryBuilder/MysqlQueryBuilder.php',
    'Phoenix\\Database\\QueryBuilder\\MysqlWithJsonQueryBuilder' => $vendorDir . '/lulco/phoenix/src/Database/QueryBuilder/MysqlWithJsonQueryBuilder.php',
    'Phoenix\\Database\\QueryBuilder\\PgsqlQueryBuilder' => $vendorDir . '/lulco/phoenix/src/Database/QueryBuilder/PgsqlQueryBuilder.php',
    'Phoenix\\Database\\QueryBuilder\\QueryBuilderInterface' => $vendorDir . '/lulco/phoenix/src/Database/QueryBuilder/QueryBuilderInterface.php',
    'Phoenix\\Exception\\ConfigException' => $vendorDir . '/lulco/phoenix/src/Exception/ConfigException.php',
    'Phoenix\\Exception\\DatabaseQueryExecuteException' => $vendorDir . '/lulco/phoenix/src/Exception/DatabaseQueryExecuteException.php',
    'Phoenix\\Exception\\IncorrectMethodUsageException' => $vendorDir . '/lulco/phoenix/src/Exception/IncorrectMethodUsageException.php',
    'Phoenix\\Exception\\InvalidArgumentValueException' => $vendorDir . '/lulco/phoenix/src/Exception/InvalidArgumentValueException.php',
    'Phoenix\\Exception\\PhoenixException' => $vendorDir . '/lulco/phoenix/src/Exception/PhoenixException.php',
    'Phoenix\\Exception\\StructureException' => $vendorDir . '/lulco/phoenix/src/Exception/StructureException.php',
    'Phoenix\\Exception\\WrongCommandException' => $vendorDir . '/lulco/phoenix/src/Exception/WrongCommandException.php',
    'Phoenix\\Migration\\AbstractMigration' => $vendorDir . '/lulco/phoenix/src/Migration/AbstractMigration.php',
    'Phoenix\\Migration\\ClassNameCreator' => $vendorDir . '/lulco/phoenix/src/Migration/ClassNameCreator.php',
    'Phoenix\\Migration\\FilesFinder' => $vendorDir . '/lulco/phoenix/src/Migration/FilesFinder.php',
    'Phoenix\\Migration\\Init\\Init' => $vendorDir . '/lulco/phoenix/src/Migration/Init/0_init.php',
    'Phoenix\\Migration\\Manager' => $vendorDir . '/lulco/phoenix/src/Migration/Manager.php',
    'Phoenix\\Migration\\MigrationCreator' => $vendorDir . '/lulco/phoenix/src/Migration/MigrationCreator.php',
    'Phoenix\\Migration\\MigrationNameCreator' => $vendorDir . '/lulco/phoenix/src/Migration/MigrationNameCreator.php',
    'Phoenix\\Templates\\TemplateManager' => $vendorDir . '/lulco/phoenix/src/Templates/TemplateManager.php',
    'SMTP' => $vendorDir . '/phpmailer/phpmailer/class.smtp.php',
    'Stringable' => $vendorDir . '/symfony/polyfill-php80/Resources/stubs/Stringable.php',
    'UnhandledMatchError' => $vendorDir . '/symfony/polyfill-php80/Resources/stubs/UnhandledMatchError.php',
    'ValueError' => $vendorDir . '/symfony/polyfill-php80/Resources/stubs/ValueError.php',
    'ntlm_sasl_client_class' => $vendorDir . '/phpmailer/phpmailer/extras/ntlm_sasl_client.php',
    'phpmailerException' => $vendorDir . '/phpmailer/phpmailer/class.phpmailer.php',
);
