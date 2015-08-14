$(document).ready ->

    $filterInput = $('.filter-term') # Input to filter agents by search term
    $toggleInactiveText = $('#toggle-inactive-text') # Text in the button to toggle showing inactive agents
    $faIcon = $('.fa-eye-slash') # Icon in the button to toggle showing inactive agents

    # Enable the jquery tablesort plugin
    $('table').stupidtable();

    ###*
     * Hide items that do not contain the search term unless the search term is empty
     * @param  {string} s Search term
     * @return {undefined}
    ###
    filterAgents = (s) ->
        $agents = $ '.agent'
        $agents.each ->
            if ($(this).text().indexOf(s) > -1 or s.length is 0) and ($(this).hasClass('agent-active') or $toggleInactiveText.text() == "Hide Inactive")
                $(this).show()
            else
                $(this).hide()

    $('#toggle-inactive').click ->
        if ($toggleInactiveText.text() == 'Hide Inactive')
            $toggleInactiveText.text('Show Inactive')
            $faIcon.attr('class', 'fa fa-eye fa-fw')
        else
            $toggleInactiveText.text('Hide Inactive')
            $faIcon.attr('class', 'fa fa-eye-slash fa-fw')
        filterAgents $filterInput.val()

    $filterInput.focus() # Focus on the filter input when the page loads
    $filterInput.keydown (e) ->
        if e.keyCode is 27 # If the key is 'esc' then unfocus the input field
            $filterInput.blur()
            $filterInput.val('')
        filterAgents($(this).val())
    $filterInput.keyup (e) ->
        filterAgents($(this).val())