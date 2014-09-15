$(function(){
var sampleTags = [];

//-------------------------------
// Minimal
//-------------------------------
$('#myTags').tagit();

//-------------------------------
// Single field
//-------------------------------
$('#singleFieldTags').tagit({
	availableTags: sampleTags,
	// This will make Tag-it submit a single form value, as a comma-delimited field.
	singleField: true,
	singleFieldNode: $('#mySingleField')
});

// singleFieldTags2 is an INPUT element, rather than a UL as in the other 
// examples, so it automatically defaults to singleField.
$('#singleFieldTags2').tagit({
	availableTags: sampleTags
});

//-------------------------------
// Preloading data in markup
//-------------------------------
$('#myULTags').tagit({
	availableTags: sampleTags, // this param is of course optional. it's for autocomplete.
	// configure the name of the input field (will be submitted with form), default: item[tags]
	itemName: 'item',
	fieldName: 'tags'
});

//-------------------------------
// Tag events
//-------------------------------
var eventTags = $('#eventTags');

var addEvent = function(text) {
	$('#events_container').append(text + '<br>');
};

eventTags.tagit({
	availableTags: sampleTags,
	beforeTagAdded: function(evt, ui) {
		if (!ui.duringInitialization) {
			addEvent('beforeTagAdded: ' + eventTags.tagit('tagLabel', ui.tag));
		}
	},
	afterTagAdded: function(evt, ui) {
		if (!ui.duringInitialization) {
			addEvent('afterTagAdded: ' + eventTags.tagit('tagLabel', ui.tag));
		}
	},
	beforeTagRemoved: function(evt, ui) {
		addEvent('beforeTagRemoved: ' + eventTags.tagit('tagLabel', ui.tag));
	},
	afterTagRemoved: function(evt, ui) {
		addEvent('afterTagRemoved: ' + eventTags.tagit('tagLabel', ui.tag));
	},
	onTagClicked: function(evt, ui) {
		addEvent('onTagClicked: ' + eventTags.tagit('tagLabel', ui.tag));
	},
	onTagExists: function(evt, ui) {
		addEvent('onTagExists: ' + eventTags.tagit('tagLabel', ui.existingTag));
	}
});

//-------------------------------
// Read-only
//-------------------------------
$('#readOnlyTags').tagit({
	readOnly: true
});

//-------------------------------
// Tag-it methods
//-------------------------------
$('#methodTags').tagit({
	availableTags: sampleTags
});

//-------------------------------
// Allow spaces without quotes.
//-------------------------------
$('#allowSpacesTags').tagit({
	availableTags: sampleTags,
	allowSpaces: true
});

//-------------------------------
// Remove confirmation
//-------------------------------
$('#removeConfirmationTags').tagit({
	availableTags: sampleTags,
	removeConfirmation: true
});

});


$(document).ready(function(){
	$('#btEnviarLista').click(function(){
		$('#loader').fadeIn();
		var emails = $('#mySingleField').val();
		var idListaCasamento = $('#idListaCasamento').val();
		var url = urlSite();
		$.post(url+'/actions/lista-casamento.php', { 'acao': 'enviarEmailListaCasamento', 'idListaCasamento': idListaCasamento, 'emails': emails }, 
			function(data) {
			if(data.retorno == 'sucesso'){
				alert('E-mails enviados com sucesso!');
			} else {
				alert('Ocorreu um erro ao enviar os e-mails, verifique os dados e tente novamente!');
			}
			$('#loader').fadeOut();
		}, 'json');
	});
});
