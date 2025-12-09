@extends('layouts.app')

@section('title', 'Lista de Produtos')

@section('content')
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px;">
        <h2 style="color: #2d3748; font-size: 2em;">📦 Produtos</h2>
        <a href="{{ route('produtos.create') }}" class="btn btn-primary">➕ Novo Produto</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            ✅ {{ session('success') }}
        </div>
    @endif

    @if($produtos->count() > 0)
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Preço</th>
                    <th>Quantidade</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($produtos as $produto)
                    <tr>
                        <td>{{ $produto->id }}</td>
                        <td>{{ $produto->nome }}</td>
                        <td>R$ {{ number_format($produto->preco, 2, ',', '.') }}</td>
                        <td>{{ $produto->quantidade }}</td>
                        <td>
                            <div class="actions">
                                <a href="{{ route('produtos.show', $produto) }}" class="btn btn-primary" style="padding: 8px 16px;">👁️ Ver</a>
                                <a href="{{ route('produtos.edit', $produto) }}" class="btn btn-warning" style="padding: 8px 16px;">✏️ Editar</a>
                                <form action="{{ route('produtos.destroy', $produto) }}" method="POST" style="display: inline;" onsubmit="return confirm('Tem certeza que deseja excluir este produto?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" style="padding: 8px 16px;">🗑️ Excluir</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="pagination">
            {{ $produtos->links() }}
        </div>
    @else
        <div style="text-align: center; padding: 60px; color: #718096;">
            <p style="font-size: 1.5em; margin-bottom: 20px;">📭 Nenhum produto cadastrado ainda.</p>
            <a href="{{ route('produtos.create') }}" class="btn btn-primary">Cadastrar Primeiro Produto</a>
        </div>
    @endif
@endsection