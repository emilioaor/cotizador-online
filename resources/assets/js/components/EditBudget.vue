<template>
    <section class="register-budget">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <h1>
                        <i class="glyphicon glyphicon-th-list" v-if="! loading"></i>
                        <img src="/img/loading.gif" v-if="loading">
                        Generar cotización
                    </h1>
                </div>
            </div>

            <div class="row">
                <!-- Cotizador -->
                <div class="col-md-10">
                    <div class="panel panel-default">
                        <div class="panel-body">

                            <table style="width: 100%">
                                <!-- HEADER -->
                                <tr style="color: #FFFFFF;">
                                    <td style="width: 30%; background-color: #34a7ac">
                                        <!-- Title -->
                                        <div class="form-group">
                                            <input
                                                    type="text"
                                                    class="form-control input-hover"
                                                    id="title"
                                                    name="title"
                                                    placeholder="Titulo"
                                                    v-model="form.title"
                                                    >
                                        </div>
                                    </td>
                                    <td style="width: 70%;">

                                        <table style="width: 100%;">
                                            <tr>
                                                <td style="width: 100%; text-align: right;padding-bottom: 20px;" colspan="3">
                                                    <!-- Logo -->
                                                    <img    style="width: 100%; max-width: 200px;"
                                                            v-bind:src="logo"
                                                            >
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 33.3333333%">
                                                    <!-- Phone -->
                                                    <p style="width: 96%; background-color: #38a9a8;height: 130px;margin: 0 0 0 4%;padding-top: 35px;text-align: center;font-size: 13px;position: relative;">
                                                        <i class="glyphicon glyphicon-phone" style="position:absolute;top: 20px;left: 85px;font-size: 30px;"></i>
                                                        <br>
                                                        {{ userData.phone }}
                                                    </p>
                                                </td>
                                                <td style="width: 33.3333333%">
                                                    <!-- Address -->
                                                    <p style="width: 96%; background-color: #408b88;height: 130px;margin: 0 0 0 4%;padding-top: 35px;text-align: center;font-size: 13px;position: relative;">
                                                        <i class="glyphicon glyphicon-map-marker" style="position:absolute;top: 20px;left: 85px;font-size: 30px;"></i>
                                                        <br>
                                                        {{ userData.address }}
                                                    </p>
                                                </td>
                                                <td style="width: 33.3333333%">
                                                    <!-- Email -->
                                                    <p style="width: 96%; background-color: #277f6a;height: 130px;margin: 0 0 0 4%;padding-top: 35px;text-align: center;font-size: 13px;position: relative;">
                                                        <i class="glyphicon glyphicon-envelope" style="position:absolute;top: 20px;left: 85px;font-size: 30px;"></i>
                                                        <br>
                                                        {{ userData.email }}
                                                    </p>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <!-- /HEADER -->

                                <!-- INFO -->
                                <tr>
                                    <td style="width: 30%;">
                                        <!-- Client Info -->
                                        <p style="margin: 25px 0 0 0;font-size: 16px;">
                                            <strong>
                                                {{ business_name }}
                                            </strong>
                                        </p>
                                        <p style="margin: 0;">
                                        <div class="form-group">
                                            <div style="width: 50%;float:left;">
                                                <input
                                                        type="text"
                                                        class="form-control input-hover"
                                                        id="client_label"
                                                        name="client_label"
                                                        v-model="form.client_label"
                                                        >
                                            </div>
                                            <div style="width: 50%;float:left;">
                                                <input
                                                        type="text"
                                                        class="form-control"
                                                        id="client_value"
                                                        name="client_value"
                                                        placeholder="Cliente"
                                                        v-model="form.client_value"
                                                        v-validate
                                                        data-vv-rules="required"
                                                        v-bind:class="{'input-error': errors.has('client_value')}"
                                                        >
                                                <p class="error" v-if="errors.firstByRule('client_value', 'required')">
                                                    Cliente es requerido
                                                </p>
                                            </div>
                                        </div>
                                        </p>

                                    </td>
                                    <td style="width: 70%;">


                                        <p style="width: 80%;text-align: right;float: left;color: #699797;font-weight: 600;margin-top: 25px;margin-bottom: 0;">
                                            N°:
                                        </p>
                                        <p style="width: 20%;text-align: right;float: left;font-weight: 800;margin-top: 25px;margin-bottom: 0;">
                                            #{{ form.public_id }}
                                        </p>

                                        <p style="width: 80%;text-align: right;float: left;color: #699797;font-weight: 600;margin-bottom: 0;">
                                            <input
                                                    type="text"
                                                    class="form-control input-hover"
                                                    id="creation_date_label"
                                                    name="creation_date_label"
                                                    v-model="form.creation_date_label"
                                                    style="color: #699797;font-weight: 600;"
                                                    >
                                        </p>
                                        <p style="width: 20%;text-align: right;float: left;font-weight: 800;margin-bottom: 0;">
                                            <datepicker
                                                    name = "creation_date_value"
                                                    id = "creation_date_value"
                                                    language="es"
                                                    input-class = "form-control"
                                                    format = "dd-MM-yyyy"
                                                    v-model="initDate"
                                                    @input="setCreationDate($event)"
                                                    ></datepicker>
                                        </p>

                                    </td>
                                </tr>
                                <!-- /INFO -->
                            </table>


                            <!-- TABLE -->
                            <table style="width: 100%;margin-top: 30px;">
                                <thead>
                                <tr style="background-color: #3ebbb5; text-align: center;color: #FFFFFF;height: 50px;font-weight: bold;font-size: 16px;">
                                    <td style="width: 10%">#</td>
                                    <td style="width: 50%">
                                        <input
                                                type="text"
                                                class="form-control input-hover"
                                                id="table_description_label"
                                                name="table_description_label"
                                                v-model="form.table_description_label"
                                                >
                                    </td>
                                    <td style="width: 10%">
                                        <input
                                                type="text"
                                                class="form-control input-hover"
                                                id="table_quantity_label"
                                                name="table_quantity_label"
                                                v-model="form.table_quantity_label"
                                                >
                                    </td>
                                    <td style="width: 15%">
                                        <input
                                                type="text"
                                                class="form-control input-hover"
                                                id="table_price_label"
                                                name="table_price_label"
                                                v-model="form.table_price_label"
                                                >
                                    </td>

                                    <td style="width: 15%">
                                        <input
                                                type="text"
                                                class="form-control input-hover"
                                                id="table_total_label"
                                                name="table_total_label"
                                                v-model="form.table_total_label"
                                                >
                                    </td>
                                </tr>
                                </thead>
                                <!-- Detail -->
                                <tr style="height: 40px;color: #222" v-for="detail,id in form.details">
                                    <td style="text-align: center;">
                                        <a @click="removeDetail(id)">X</a>
                                    </td>
                                    <td>
                                        <input
                                                type="text"
                                                class="form-control"
                                                v-bind:name="'description' + id"
                                                v-model="detail.description"
                                                v-validate
                                                data-vv-rules="required"
                                                min="1"
                                                v-bind:class="{'input-error': errors.has('description' + id)}"
                                                >
                                        <p class="error" v-if="errors.firstByRule('description' + id, 'required')">
                                            Campo requerido
                                        </p>
                                    </td>
                                    <td>
                                        <input
                                                type="number"
                                                class="form-control"
                                                v-bind:name="'quantity' + id"
                                                v-model="detail.quantity"
                                                v-validate
                                                data-vv-rules="required"
                                                min="1"
                                                v-bind:class="{'input-error': errors.has('quantity' + id)}"
                                                >
                                        <p class="error" v-if="errors.firstByRule('quantity' + id, 'required')">
                                            Cantidad
                                        </p>
                                    </td>
                                    <td>
                                        <input
                                                type="number"
                                                class="form-control"
                                                v-bind:name="'price' + id"
                                                v-model="detail.price"
                                                v-validate
                                                min="0"
                                                data-vv-rules="required"
                                                >
                                        <p class="error" v-if="errors.firstByRule('price' + id, 'required')">
                                            Precio
                                        </p>
                                    </td>
                                    <td>
                                        <input
                                                type="text"
                                                class="form-control"
                                                v-bind:value="currencySymbol + (detail.price * detail.quantity) + currencySymbol2"
                                                disabled
                                                >

                                    </td>
                                </tr>

                                <tr>
                                    <td colspan="5">
                                        <button
                                                class="btn btn-default"
                                                @click="addDetail()"
                                                >
                                            <i class="glyphicon glyphicon-plus"></i>
                                            Agregar detalle
                                        </button>
                                    </td>
                                </tr>

                                <!-- /Detail -->

                                <!-- Footer -->
                                <tfoot>
                                <tr style="background-color: #66bcc8;color: #FFFFFF;height: 35px;font-weight: bold;">
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td style="text-align: center;">
                                        <input
                                                type="text"
                                                class="form-control input-hover"
                                                id="subtotal_footer_label"
                                                name="subtotal_footer_label"
                                                v-model="form.subtotal_footer_label"
                                                >
                                    </td>
                                    <td style="text-align: center;">
                                        <input
                                                type="text"
                                                class="form-control"
                                                id="subtotal_footer_value"
                                                name="subtotal_footer_value"
                                                v-bind:value="currencySymbol + getSubTotal() + currencySymbol2"
                                                disabled
                                                >
                                    </td>
                                </tr>


                                <!-- Discount -->
                                <tr style="background-color: #66bcc8;color: #FFFFFF;height: 35px;font-weight: bold;" v-if="showDiscount">
                                    <td></td>
                                    <td></td>
                                    <td style="text-align: right;">
                                        <button class="btn btn-danger" @click="showDiscount = false; form.discount_value = null">
                                            X
                                        </button>
                                    </td>
                                    <td>
                                        <input
                                                type="text"
                                                class="form-control input-hover"
                                                id="discount_label"
                                                name="discount_label"
                                                v-model="form.discount_label"
                                                >
                                    </td>
                                    <td>
                                        <div style="width: 50%;float:left;">
                                            <input
                                                    type="number"
                                                    class="form-control"
                                                    id="discount_value"
                                                    name="discount_value"
                                                    v-model="form.discount_value"
                                                    v-validate
                                                    data-vv-rules="required"
                                                    v-bind:class="{'input-error': errors.has('discount_value')}"
                                                    >
                                            <p class="error" v-if="errors.firstByRule('discount_value', 'required')">
                                                Requerido
                                            </p>
                                        </div>
                                        <div style="width: 50%;float:left;">
                                            <select
                                                    class="form-control"
                                                    v-model="form.discount_type"
                                                    >
                                                <option value="1">%</option>
                                                <option value="2">{{ currencySymbol !== '' ? currencySymbol : 'Monto' }}</option>
                                            </select>
                                        </div>

                                    </td>
                                </tr>

                                <!-- Shipping -->
                                <tr style="background-color: #66bcc8;color: #FFFFFF;height: 35px;font-weight: bold;" v-if="showShipping">
                                    <td></td>
                                    <td></td>
                                    <td style="text-align: right;">
                                        <button class="btn btn-danger" @click="showShipping = false; form.shaping_value = null">
                                            X
                                        </button>
                                    </td>
                                    <td>
                                        <input
                                                type="text"
                                                class="form-control input-hover"
                                                id="shaping_label"
                                                name="shaping_label"
                                                v-model="form.shaping_label"
                                                >
                                    </td>
                                    <td>
                                        <input
                                                type="number"
                                                class="form-control"
                                                id="shaping_value"
                                                name="shaping_value"
                                                v-model="form.shaping_value"
                                                v-validate
                                                data-vv-rules="required"
                                                v-bind:class="{'input-error': errors.has('shaping_value')}"
                                                >
                                        <p class="error" v-if="errors.firstByRule('shaping_value', 'required')">
                                            Requerido
                                        </p>
                                    </td>
                                </tr>

                                <!-- Select Discount, Shipping -->
                                <tr style="height: 35px;" v-if="!showDiscount || !showShipping">
                                    <td></td>
                                    <td></td>
                                    <td style="text-align: center">

                                    </td>
                                    <td style="text-align: center">
                                        <a @click="showDiscount = true" v-if="!showDiscount">
                                            <i class="glyphicon glyphicon-plus"></i>
                                            Descuento
                                        </a>
                                    </td>
                                    <td style="text-align: center">
                                        <a @click="showShipping = true" v-if="!showShipping">
                                            <i class="glyphicon glyphicon-plus"></i>
                                            Envio
                                        </a>
                                    </td>
                                </tr>

                                <!-- Total -->
                                <tr style="background-color: #66bcc8;color: #FFFFFF;height: 35px;font-weight: bold;">
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <input
                                                type="text"
                                                class="form-control input-hover"
                                                id="total_footer_label"
                                                name="total_footer_label"
                                                v-model="form.total_footer_label"
                                                >
                                    </td>
                                    <td>
                                        <input
                                                type="text"
                                                class="form-control"
                                                id="total_footer_value"
                                                name="total_footer_value"
                                                v-bind:value="currencySymbol + getTotal() + currencySymbol2"
                                                disabled
                                                >
                                    </td>
                                </tr>
                                </tfoot>
                                <!-- /Footer -->
                            </table>
                            <!-- /TABLE -->

                            <table style="width: 100%;margin-top: 20px;">
                                <!-- Notes -->
                                <tr>
                                    <td colspan="5">
                                        <input
                                                type="text"
                                                class="form-control input-hover"
                                                id="notes_label"
                                                name="notes_label"
                                                v-model="form.notes_label"
                                                >

                                    <textarea
                                            name="notes_value"
                                            id="notes_value"
                                            placeholder="Todo lo relevante a la cotización"
                                            class="form-control"
                                            rows="2"
                                            v-model="form.notes_value"
                                            ></textarea>
                                    </td>
                                </tr>

                                <!-- Terms and conditions -->
                                <tr>
                                    <td colspan="5" style="padding-top: 20px;">
                                        <input
                                                type="text"
                                                class="form-control input-hover"
                                                id="terms_label"
                                                name="terms_label"
                                                v-model="form.terms_label"
                                                >

                                        <textarea
                                                name="terms_value"
                                                id="terms_value"
                                                placeholder="Intereses, metodos de pago, tiempos, etc"
                                                class="form-control"
                                                rows="2"
                                                v-model="form.terms_value"
                                                ></textarea>
                                    </td>
                                </tr>
                            </table>


                            <h4 style="background-color: #66bcc8;color: #FFFFFF;padding: 10px;text-align: center;font-weight: bold;margin-top: 50px;">
                                Valido por 10 días
                            </h4>

                            <div class="form-group">
                                <div class="text-center">
                                    <p class="error" v-if="errors.any()">
                                        Disculpe, hay algunos errores en la cotización
                                    </p>
                                    <button class="btn btn-warning btn-lg" @click="validateForm()" v-if="! loading">
                                        <i class="glyphicon glyphicon-save"></i>
                                        Actualizar cotización
                                    </button>
                                    <a v-bind:href="'/user/budget/' + form.public_id + '/generatePdf'" target="_blank" class="btn btn-info btn-lg" v-if="! loading">
                                        <i class="glyphicon glyphicon-share"></i>
                                        Generar PDF
                                    </a>
                                    <img src="/img/loading.gif" v-if="loading">
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
    import Datepicker from 'vuejs-datepicker';

    export default {
        props: ['formData', 'user'],
        components: {
            Datepicker
        },

        data: function () {
            return {
                loading: false,
                currencySymbol: '',
                currencySymbol2: ' Bsf',
                logo: '/uploads/' + JSON.parse(this.user).logo,
                business_name: JSON.parse(this.user).business_name,
                initDate: '',
                showDiscount: false,
                showShipping: false,
                userData: JSON.parse(this.user),
                form: JSON.parse(this.formData)
            }
        },

        mounted: function () {
            this.showDiscount = (this.form.discount_value !== null && this.form.discount_value !== '');
            this.showShipping = (this.form.shaping_value !== null && this.form.shaping_value !== '');

            if (this.form.creation_date_value !== null && this.creation_date_value !== '') {
                const date = this.form.creation_date_value.split('-');

                this.initDate = new Date(date[0], parseInt(date[1]) - 1, date[2]);
            }
        },

        methods: {
            validateForm: function () {
                this.$validator.validateAll().then((res) => {
                    if (res) {
                        this.sendForm();
                    }
                })
            },

            sendForm: function () {

                this.loading = true;
                this.form.subtotal_footer_value = this.getSubTotal();
                this.form.total_footer_value = this.getTotal();
                this.form.total_head_value = this.getFinalTotal();

                axios.put('/user/budget/' + this.form.public_id, this.form)
                    .then((res) => {
                        if (res.data.success) {
                            location.href = res.data.redirect;
                        }
                    })
                    .catch((err) => {
                        this.loading = false;

                        console.log('Error', err);
                    })
                ;
            },

            addDetail: function() {
                this.form.details.push({
                    description: '',
                    quantity: 1,
                    price: 0,
                });
            },

            removeDetail: function (index) {
                if (this.form.details.length <= 1) {
                    return true;
                }

                this.form.details.splice(index, 1);
            },

            getSubTotal: function () {
                let total = 0;

                for (let i in this.form.details) {
                    total += this.form.details[i].price * this.form.details[i].quantity;
                }

                return total;
            },

            getTotal: function () {
                let total = this.getSubTotal();

                // Decuento
                if (this.form.discount_value !== null && this.form.discount_value !== '') {
                    if (this.form.discount_type == 1) {
                        // Porcentaje
                        total -= (total * (this.form.discount_value / 100));
                    } else {
                        // Monto
                        total -= this.form.discount_value;
                    }
                }

                // Envio
                if (this.form.shaping_value !== null && this.form.shaping_value !== '') {
                    total += parseFloat(this.form.shaping_value);
                }

                return total;
            },

            getFinalTotal: function () {
                let total = this.getTotal();

                return total;
            },

            setCreationDate: function (date) {
                let day = (date.getDate() < 10) ? '0' + date.getDate() : date.getDate();
                let month = ((date.getMonth() + 1) < 10) ? '0' + (date.getMonth() + 1) : (date.getMonth() + 1);
                let year = date.getFullYear();

                this.form.creation_date_value = year + '-' + month + '-' + day;
            },
        }
    }
</script>
