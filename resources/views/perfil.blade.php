@extends('layouts.perfil')

@section('content')
<div class="profile-header">
    <a href="{{ route('dashboard') }}">
        <img src="{{ asset('images/Qualityplus.png') }}" alt="QualityPlus Logo" class="profile-logo">
    </a>
    <img src="{{ $user->profile_image ? asset('storage/' . $user->profile_image) . '?t=' . uniqid() : asset('images/Perfil.png') }}" 
     alt="Mini Perfil" 
     class="header-profile-image" 
     id="header-profile-image">
</div>
<div class="profile-container">
    <div class="profile-card">
        <div class="profile-image">
        <img src="{{ $user->profile_image ? asset('storage/' . $user->profile_image) . '?t=' . uniqid() : asset('images/Perfil.png') }}" 
     alt="Imagem do Perfil" 
     id="profile-image">
        </div>

        <div class="profile-info">
            <h2>{{ $user->name }}</h2>
            <span class="role-tag">Cliente</span>
        </div>

        <img src="{{ asset('images/Edit.png') }}" alt="Editar" id="edit-button" class="edit-icon">

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="logout-button">Sair da Conta</button>
        </form>
    </div>

    <div class="bio-card">
        <form id="profile-form" class="edit-form" method="POST" action="{{ route('perfil.update') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <h3>Nome</h3>
                <span class="display-field" id="display-name">{{ $user->name }}</span>
                <input type="text" name="name" class="edit-field hidden" value="{{ $user->name }}">
            </div>

            <div class="form-group">
                <h3>Perfil</h3>
                <div class="profile-details">
                    <div class="detail-item">
                        <label>Data de Nascimento</label>
                        <span class="display-field" id="display-birth-date">
                            {{ $user->birth_date ?? 'Data não informada' }}
                        </span>
                        <input type="text" name="birth_date" class="edit-field hidden birth-date-input" 
                               value="{{ $user->birth_date }}"
                               placeholder="DD/MM/AAAA"
                               maxlength="10">
                    </div>
                    
                    <div class="detail-item">
                        <label>Email de Contato</label>
                        <span class="display-field" id="display-email">
                            {{ $user->contact_email ?? 'Email não informado' }}
                        </span>
                        <input type="email" name="contact_email" class="edit-field hidden" 
                               value="{{ $user->contact_email }}"
                               placeholder="SeuContato@email.com">
                    </div>
                    
                    <div class="detail-item">
                        <label>Telefone</label>
                        <span class="display-field" id="display-phone">
                            {{ $user->phone ?? 'Telefone não informado' }}
                        </span>
                        <input type="tel" name="phone" class="edit-field hidden phone-input" 
                               value="{{ $user->phone }}"
                               placeholder="Digite seu telefone">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <h3>Sobre</h3>
                <span class="display-field about-text" id="display-about">
                    {{ $user->about ?? 'Compartilhe um pouco sobre você...' }}
                </span>
                <textarea name="about" class="edit-field hidden about-textarea">{{ $user->about }}</textarea>
            </div>

            <div class="form-group photo-upload hidden">
                <h3>Foto de Perfil</h3>
                <input type="file" name="profile_image" class="edit-field" accept="image/*">
            </div>

            <div class="edit-buttons hidden">
                <button type="submit" class="save-button" id="save-button">Salvar</button>
                <button type="button" class="cancel-button" id="cancel-button">Cancelar</button>
            </div>
        </form>
    </div>
</div>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
@endsection

@section('scripts')
<script>
const DDDs = [
    '11', '12', '13', '14', '15', '16', '17', '18', '19',
    '21', '22', '24', '27', '28',
    '31', '32', '33', '34', '35', '37', '38',
    '41', '42', '43', '44', '45', '46', '47', '48', '49',
    '51', '53', '54', '55',
    '61', '62', '63', '64', '65', '66', '67', '68', '69',
    '71', '73', '74', '75', '77', '79',
    '81', '82', '83', '84', '85', '86', '87', '88', '89',
    '91', '92', '93', '94', '95', '96', '97', '98', '99'
];

document.addEventListener('DOMContentLoaded', function() {
    const editButton = document.getElementById('edit-button');
    const form = document.getElementById('profile-form');
    const editButtons = document.querySelector('.edit-buttons');
    const displayFields = document.querySelectorAll('.display-field');
    const editFields = document.querySelectorAll('.edit-field');
    const cancelButton = document.getElementById('cancel-button');
    const phoneInput = document.querySelector('.phone-input');
    const birthDateInput = document.querySelector('.birth-date-input');
    const photoUpload = document.querySelector('.photo-upload');

    function toggleEditMode(isEditing) {
        displayFields.forEach(field => {
            field.classList.toggle('hidden', isEditing);
        });
        
        editFields.forEach(field => {
            field.classList.toggle('hidden', !isEditing);
        });
        
        editButtons.classList.toggle('hidden', !isEditing);
        photoUpload.classList.toggle('hidden', !isEditing);
    }

    editButton.addEventListener('click', () => {
        toggleEditMode(true);
    });

    cancelButton.addEventListener('click', () => {
        location.reload(); // Recarrega a página para restaurar os valores originais
    });

    // Sistema de formatação da data de nascimento
    birthDateInput?.addEventListener('input', function(e) {
        let value = this.value.replace(/\D/g, '');
        
        if (value.length >= 2) {
            value = value.substring(0, 2) + '/' + value.substring(2);
        }
        if (value.length >= 5) {
            value = value.substring(0, 5) + '/' + value.substring(5);
        }
        if (value.length > 10) {
            value = value.substring(0, 10);
        }
        
        this.value = value;
    });

    // Sistema inteligente de DDD e telefone
    let previousValue = '';
    phoneInput?.addEventListener('input', function(e) {
        let value = this.value.replace(/\D/g, '');
        
        if (this.value.length < previousValue.length) {
            if (value.length < 2) {
                this.value = value;
            } else {
                const ddd = value.substring(0, 2);
                if (DDDs.includes(ddd)) {
                    let restOfNumber = value.substring(2);
                    if (restOfNumber.length > 5) {
                        restOfNumber = restOfNumber.substring(0, 5) + '-' + restOfNumber.substring(5);
                    }
                    this.value = `(+${ddd}) ${restOfNumber}`;
                } else {
                    this.value = value;
                }
            }
        } else {
            if (value.length >= 2) {
                const ddd = value.substring(0, 2);
                if (DDDs.includes(ddd)) {
                    let restOfNumber = value.substring(2);
                    if (restOfNumber.length > 5) {
                        restOfNumber = restOfNumber.substring(0, 5) + '-' + restOfNumber.substring(5);
                    }
                    this.value = `(+${ddd}) ${restOfNumber}`;
                }
            }
        }
        
        previousValue = this.value;
    });

    // Preview da imagem
    const imageInput = document.querySelector('input[name="profile_image"]');
    const profileImage = document.getElementById('profile-image');
    const headerProfileImage = document.getElementById('header-profile-image');
    
    imageInput?.addEventListener('change', function(e) {
        if (this.files && this.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                profileImage.src = e.target.result;
                headerProfileImage.src = e.target.result;
            };
            reader.readAsDataURL(this.files[0]);
        }
    });
});
</script>
@endsection