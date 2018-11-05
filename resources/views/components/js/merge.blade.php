<script>
    function getSelectedTicketsIds(){
        return $("input[name^=selected]:checked").map(function() {
            return $(this).attr("meta:index");
        }).toArray();
    }

    function mergeTickets(){
        var tickets = getSelectedTicketsIds();
        if(tickets.length == 0) return;

        var ticket = prompt("{{__('ticket.mergeDesc2')}}");

        $.post({
            url: "{{ route('tickets.merge.store') }}",
            data: {
                "_token": "{{ csrf_token() }}",
                "ticket_id" : ticket,
                "tickets" : tickets
            },
            success: function(){
                location.reload();
            }
        });
    }
</script>
