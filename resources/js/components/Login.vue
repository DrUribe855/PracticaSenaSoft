<template>
    <div class="card">
        <div class="card-header">Iniciar Sesión</div>
        <div class="card-body">
            <form action="#" method="POST">
                <div class="form-group">
                    <label for="email">Correo Electrónico:</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="password">Contraseña:</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <button type="submit" class="btn btn-primary btn-block mt-3">Iniciar Sesión</button>
            </form>
        </div>
    </div>
</template>

<script>
    export default {
        props:[],
        data(){
            return {}
        },
        created(){

        },
        methods:{

        },
    }
</script>
