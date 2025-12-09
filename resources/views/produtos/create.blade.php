@extends('layouts.app')

@section('title', 'Novo Produto')

@section('content')
    <a href="{{ route('produtos.index') }}" class="back-link">← Voltar para lista</a>

    <h2 style="color: #2d3748; font-size: 2em; margin-bottom: 30px;">➕ Cadastrar Novo Produto</h2>

    <form action="{{ route('produtos.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="nome">Nome do Produto *</label>
            <input type="text" id="nome" name="nome" class="form-control" value="{{ old('nome') }}" required>
            @error('nome')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="descricao">Descrição</label>
            <textarea id="descricao" name="descricao" class="form-control">{{ old('descricao') }}</textarea>
            @error('descricao')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="preco">Preço (R$) *</label>
            <input type="number" id="preco" name="preco" class="form-control" step="0.01" min="0" value="{{ old('preco') }}" required>
            @error('preco')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="quantidade">Quantidade em Estoque *</label>
            <input type="number" id="quantidade" name="quantidade" class="form-control" min="0" value="{{ old('quantidade') }}" required>
            @error('quantidade')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>

        <div style="display: flex; gap: 10px; margin-top: 30px;">
            <button type="submit" class="btn btn-success">💾 Salvar Produto</button>
            <a href="{{ route('produtos.index') }}" class="btn btn-secondary">❌ Cancelar</a>
        </div>
    </form>
@endsection