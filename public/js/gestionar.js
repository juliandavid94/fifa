var table= $('#busqueda').DataTable({
           bStateSave: !0,
           lengthMenu: [[10, 20, 50, 100, 150, -1], [10, 20, 50, 100, 150, "Todos"]],
           language: {
                   processing: 'Cargando... ',
                   aria: {
                           sortAscending: ": Activar para ordenar la columna de manera ascendente",
                           sortDescending: ": Activar para ordenar la columna de manera descendente"
                   },
                   emptyTable: "No hay datos disponibles en la tabla",
                   info: "Mostrando _START_ A _END_ De _TOTAL_ Registros",
                   infoEmpty: "No se encontraron coincidencias ",
                   infoFiltered: "(filtered1 from _MAX_ total registros)",
                   lengthMenu: "_MENU_ Registros",
                   search: "Filtrar Resultado:",
                   zeroRecords: "No se encontraron resultados",
                   paginate: {
                       "previous": 'Ant',
                       "next": 'Sig',
                       "page": "Pagina",
                       "pageOf": "de"
                   }
           },
           buttons: [],
           responsive: !0,
           order: [[2, "desc"]],
           lengthMenu: [[5, 10, 15, 50, -1], [5, 10, 15, 50, "Todos"]],
           pageLength: 10,
           columnDefs: [{orderable: !1, targets: [0]}, {
                   searchable: !1,
                   targets: [0]
           }, {className: "dt-right"}],
           bStateSave: !0,
           pagingType: "bootstrap_extended"
       });