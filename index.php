<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedidos Quintal de Vó</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
            color: #333;
        }
        .container {
            max-width: 900px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        h1 {
            font-size: 2.5rem;
            text-align: center;
            margin-bottom: 20px;
            color: #044c0d;
            text-shadow: 1px 1px 1px #ccc;
        }
        .buttons {
            margin-bottom: 20px;
            text-align: center;
        }
        .buttons button {
            padding: 10px 20px;
            font-size: 1rem;
            background-color: #6c63ff;
            color: #fff;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .buttons button:hover {
            background-color: #554fad;
        }
        .form-container {
            margin-bottom: 20px;
            background-color: #f9f9f9;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }
        form {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }
        form input, form select {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            flex: 1;
        }
        form button[type="submit"] {
            padding: 10px 20px;
            background-color: #6c63ff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        form button[type="submit"]:hover {
            background-color: #554fad;
        }
        .accordion-item {
            margin-bottom: 10px;
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 8px;
            overflow: hidden;
        }
        .accordion-header {
            padding: 15px;
            background-color: #6c63ff;
            color: #fff;
            font-size: 1.2rem;
            cursor: pointer;
            user-select: none;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .accordion-header:hover {
            background-color: #554fad;
        }
        .accordion-body {
            padding: 10px;
            display: none;
        }
        .accordion-body.show {
            display: block;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th:first-child, td:first-child {
            padding-left: 20px;
        }
        th:last-child, td:last-child {
            padding-right: 20px;
        }
        .edit-delete-buttons button {
            padding: 8px 12px;
            margin-right: 5px;
            font-size: 0.9rem;
            background-color: #6c63ff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .edit-delete-buttons button:hover {
            background-color: #554fad;
        }
        .hidden {
            display: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Pedidos Quintal de Vó</h1>
        <div class="buttons">
            <button onclick="showAddProductForm()">Adicionar Produto</button>
        </div>
        <div class="form-container hidden" id="product-form">
            <form id="add-product-form">
                <input type="text" name="nome" placeholder="Nome do Produto" required>
                <input type="number" name="quantidade" step="0.01" placeholder="Quantidade" required>
                <select name="unidade" required>
                    <option value="un.">Unidade</option>
                    <option value="kg">Kg</option>
                </select>
                <select name="dia_semana" required>
                    <option value="sexta">Sexta</option>
                    <option value="sabado">Sábado</option>
                    <option value="domingo">Domingo</option>
                </select>
                <button type="submit">Adicionar</button>
            </form>
        </div>
        <div class="form-container hidden" id="edit-product-form">
            <form id="edit-product">
                <input type="hidden" name="id" id="edit-id">
                <input type="text" name="nome" id="edit-nome" placeholder="Nome do Produto" required>
                <input type="number" name="quantidade" step="0.01" id="edit-quantidade" placeholder="Quantidade" required>
                <select name="unidade" id="edit-unidade" required>
                    <option value="un.">Unidade</option>
                    <option value="kg">Kg</option>
                </select>
                <select name="dia_semana" id="edit-dia_semana" required>
                    <option value="sexta">Sexta</option>
                    <option value="sabado">Sábado</option>
                    <option value="domingo">Domingo</option>
                </select>
                <button type="submit">Salvar</button>
            </form>
        </div>
        <div class="accordion">
            <div class="accordion-item">
                <div class="accordion-header" onclick="toggleAccordion('sexta')">Sexta-feira</div>
                <div class="accordion-body" id="sexta-body">
                    <table id="sexta-table">
                        <thead>
                            <tr>
                                <th>Produto</th>
                                <th>Quantidade</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Conteúdo da sexta-feira será carregado dinamicamente -->
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="accordion-item">
                <div class="accordion-header" onclick="toggleAccordion('sabado')">Sábado</div>
                <div class="accordion-body" id="sabado-body">
                    <table id="sabado-table">
                        <thead>
                            <tr>
                                <th>Produto</th>
                                <th>Quantidade</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Conteúdo do sábado será carregado dinamicamente -->
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="accordion-item">
                <div class="accordion-header" onclick="toggleAccordion('domingo')">Domingo</div>
                <div class="accordion-body" id="domingo-body">
                    <table id="domingo-table">
                        <thead>
                            <tr>
                                <th>Produto</th>
                                <th>Quantidade</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Conteúdo do domingo será carregado dinamicamente -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
        function showAddProductForm() {
            document.getElementById('product-form').classList.remove('hidden');
        }

        function showEditProductForm() {
            document.getElementById('edit-product-form').classList.remove('hidden');
        }

        function toggleAccordion(id) {
            const body = document.getElementById(`${id}-body`);
            const isOpen = body.classList.toggle('show');

            if (isOpen) {
                loadProducts(id);
            }
        }

        function loadProducts(dia_semana) {
            fetch(`load_products.php?dia_semana=${dia_semana}`)
                .then(response => response.json())
                .then(data => {
                    const table = document.getElementById(`${dia_semana}-table`).querySelector('tbody');
                    table.innerHTML = '';

                    data.forEach(product => {
                        const row = document.createElement('tr');
                        row.innerHTML = `
                            <td>${product.nome}</td>
                            <td>${product.quantidade} ${product.unidade}</td>
                            <td class="edit-delete-buttons">
                                <button onclick="showEditForm('${product.id}', '${product.nome}', '${product.quantidade}', '${product.unidade}', '${dia_semana}')">Editar</button>
                                <button onclick="deleteProduct('${product.id}', '${dia_semana}')">Excluir</button>
                            </td>
                        `;
                        table.appendChild(row);
                    });
                });
        }

        function showEditForm(id, nome, quantidade, unidade, dia_semana) {
            document.getElementById('edit-id').value = id;
            document.getElementById('edit-nome').value = nome;
            document.getElementById('edit-quantidade').value = quantidade;
            document.getElementById('edit-unidade').value = unidade;
            document.getElementById('edit-dia_semana').value = dia_semana;

            showEditProductForm();
        }

        function deleteProduct(id, dia_semana) {
            if (confirm('Tem certeza que deseja excluir este produto?')) {
                fetch(`delete_product.php?id=${id}&dia_semana=${dia_semana}`)
                    .then(response => response.text())
                    .then(data => {
                        if (data === 'success') {
                            const body = document.getElementById(`${dia_semana}-body`);
                            body.classList.add('show'); // Manter a aba aberta após exclusão
                            loadProducts(dia_semana);
                        } else {
                            alert('Erro ao excluir o produto');
                        }
                    });
            }
        }

        document.getElementById('add-product-form').addEventListener('submit', function(event) {
            event.preventDefault();
            const formData = new FormData(this);

            fetch('add_product.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.text())
            .then(data => {
                if (data === 'success') {
                    const dia_semana = formData.get('dia_semana');
                    loadProducts(dia_semana);
                    document.getElementById('product-form').classList.add('hidden');
                } else {
                    alert('Erro ao adicionar o produto');
                }
            });
        });

        document.getElementById('edit-product').addEventListener('submit', function(event) {
            event.preventDefault();
            const formData = new FormData(this);

            fetch('edit_product.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.text())
            .then(data => {
                if (data === 'success') {
                    const dia_semana = formData.get('dia_semana');
                    loadProducts(dia_semana);
                    document.getElementById('edit-product-form').classList.add('hidden');
                } else {
                    alert('Erro ao editar o produto');
                }
            });
        });

        // Carregar inicialmente os produtos da sexta-feira
        loadProducts('sexta');
    </script>
</body>
</html>
