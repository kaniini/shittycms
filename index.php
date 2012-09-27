<?
	require("config.php");
	require("base/parser.php");

	require($config['Core::TextAcquisitionBackend']);
	require($config['Core::PageRenderer']);

	if (!isset($parser)) {
		$parser_class = MARKDOWN_PARSER_CLASS;
		$parser = new $parser_class;
	}

	$backend = new AcquisitionBackend($_REQUEST['name']);
	$parser->parse($backend->getData());
	$renderer = new PageRenderer;
	$renderer->run($parser);
?>
