
/**
 * Created by mpolak on 2/23/17.
 */

(function ($) {
    'use strict';

    $(document).ready(function () {

        var baseUrl = $('meta[name="baseUrl"]').attr('content');
        var token = $('meta[name="csrfToken"]').attr('content');

        $('#newGameForm').on('submit', submitForm);
        $('#gameForm').on('submit', submitForm);
        $('#monsterKillForm').on('submit', { callback: updateMonstersKilledTable }, submitForm);
        updateMonstersKilledTable();

        function updateMonstersKilledTable() {
            var gameId = $('#gameId').val();
            var $monstersKilledTable = $('#monstersKilledTable');
            $monstersKilledTable.find('tr:not(:first)').remove();
            sendRequest('/game/monsterKilled/' + gameId, 'GET').then(function (monsters) {


                for (var i = 0; i < monsters.length; i++) {
                    var $row = $('<tr>').appendTo($monstersKilledTable);
                    var $deleteMonsterBtn = $('<span>', {
                        class: 'delete-monster-btn'
                    }).text('X').on('click', { monsterId: monsters[i].id }, deleteMonsterKilled);

                    $('<td>').text(monsters[i].name).appendTo($row);
                    $('<td>').text(monsters[i].type).appendTo($row);
                    $('<td>').text(monsters[i].number).appendTo($row);
                    $('<td>').text(monsters[i].comments).appendTo($row);
                    $('<td>').html($deleteMonsterBtn).appendTo($row);
                }
            });
        }

        function deleteMonsterKilled(event) {
            sendRequest('/game/monsterKilled/' + event.data.monsterId, 'DELETE').then(function () {
                updateMonstersKilledTable();
            });

        }

        function submitForm(event) {
            event.preventDefault();

            var $form = $(event.target);
            var apiCall = $form.data('api-call');
            var method =  $form.data('method');
            var resetForm = $form.data('reset-form') != false || false;
            var formData = new FormData($form[0]);
            var callback = event.data.callback || null;

            sendRequest(apiCall, method, formData).then(function (response) {

                if (resetForm) {
                    $form.get(0).reset();

                }

                if (callback !== null) {
                    callback();
                }

            }, function (response) {
                console.log(response);
            });

        }

        function sendRequest(route, method, data, options) {

            if (method !== 'GET') {
                data = data || new FormData();
            }

            switch (method) {
                case 'PUT':
                    method ='POST';
                    data.append('_method', 'PUT');
                    break;
                case 'DELETE':
                    method ='POST';
                    data.append('_method', 'DELETE');
                    break;
            }

            return $.ajax($.extend({
                url: baseUrl + route,
                type: method,
                data: data,
                headers: {
                    'X-CSRF-TOKEN': token
                },
                cache: false,
                dataType: 'json',
                processData: false, // Don't process the files
                contentType: false, // Set content type to false as jQuery will tell the server it's a query string request
                error: function (response) {
                    if (response.status == 401) {
                        console.warn('error');
                    }
                }
            }, options));
        }
    });

})(jQuery);
