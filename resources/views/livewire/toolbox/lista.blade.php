<div class="container" style="padding: 20px;">
    <h2 style="margin-bottom: 10px;">Lista de Softwares</h2>

    <button style="margin-bottom: 10px; padding: 6px 12px; background-color: #007bff; color: white; border: none; border-radius: 4px;">
        Novo
    </button>

    <table border="1" cellpadding="8" cellspacing="0" style="width: 100%; border-collapse: collapse;">
        <thead>
            <tr style="background-color: #f1f1f1;">
                <th>ID</th>
                <th>Nome</th>
                <th>Versão</th>
                <th>Descrição</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($softwares as $software)
                <tr>
                    <td>{{ $software->id }}</td>
                    <td>{{ $software->nome }}</td>
                    <td>{{ $software->versao }}</td>
                    <td>{{ $software->descricao }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">Nenhum software cadastrado.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
