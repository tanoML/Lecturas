<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

        <form method="POST" :action="this.routetochange">
            <input type="hidden" name="_token" :value="this.token">
            
             <div class="form-group">
                <label for="exampleInputEmail1">Nombre del campus: </label>
                <input name="campus" type="text" class="form-control" id="campus" aria-describedby="Campus" required>
                <small id="campus" class="form-text text-muted">Por favor considere que al agregar el campus sera notificado a todos los responsables</small>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Nombre del campus: </label>
                <input name="campus" type="text" class="form-control" id="campus" aria-describedby="Campus" required>
                <small id="campus" class="form-text text-muted">Por favor considere que al agregar el campus sera notificado a todos los responsables</small>
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
            </div>

        </div>
    </div>
</template>

<script>
    export default {
        props:['routetochange','token'],

        mounted() {
         
        }
    }
</script>
