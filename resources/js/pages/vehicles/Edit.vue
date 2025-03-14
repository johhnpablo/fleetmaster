<script setup lang="ts">
import { Head, useForm } from '@inertiajs/vue3';
import AppLayout from '@/layouts/AppLayout.vue';
import { ref } from 'vue';
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import {
    FormControl,
    FormDescription,
    FormField,
    FormItem,
    FormLabel,
    FormMessage,
} from '@/components/ui/form'
import {
    Select,
    SelectContent,
    SelectGroup,
    SelectItem,
    SelectTrigger,
    SelectValue,
} from '@/components/ui/select'
import { Checkbox } from '@/components/ui/checkbox';



const props = defineProps({
    vehicle: {
        type: Object,
        required: true,
    },
});


const form = useForm({
    model: props.vehicle.model || '',
    brand: props.vehicle.brand || '',
    year: props.vehicle.year || '',
    color: props.vehicle.color || '#000000',
    price: props.vehicle.price || 0,
    status: props.vehicle.status || 'active',
    maintenance_last_6_months: props.vehicle.maintenance_last_6_months || false,
});

const updateVehicle = () => {
    form.put(route('vehicles.update', props.vehicle.id));
};
</script>

<template>
    <AppLayout>
        <Head title="Editar Veículo" />
        <div class="p-6">
            <h1 class="text-2xl font-bold mb-6">Editar Veículo</h1>

            <form @submit.prevent="updateVehicle" class="space-y-6">
                <!-- Campo: Modelo -->
                <div>
                    <Label for="model">Modelo</Label>
                    <Input
                        id="model"
                        v-model="form.model"
                        type="text"
                        placeholder="Digite o modelo"
                        class="w-full"
                    />
                    <p v-if="form.errors.model" class="text-sm text-red-500">
                        {{ form.errors.model }}
                    </p>
                </div>

                <!-- Campo: Marca -->
                <div>
                    <Label for="brand">Marca</Label>
                    <Input
                        id="brand"
                        v-model="form.brand"
                        type="text"
                        placeholder="Digite a marca"
                        class="w-full"
                    />
                    <p v-if="form.errors.brand" class="text-sm text-red-500">
                        {{ form.errors.brand }}
                    </p>
                </div>

                <!-- Campo: Ano -->
                <div>
                    <Label for="year">Ano</Label>
                    <Input
                        id="year"
                        v-model="form.year"
                        type="number"
                        placeholder="Digite o ano"
                        class="w-full"
                    />
                    <p v-if="form.errors.year" class="text-sm text-red-500">
                        {{ form.errors.year }}
                    </p>
                </div>

                <!-- Campo: Cor -->
                <div>
                    <Label for="color">Cor</Label>
                    <Input
                        id="color"
                        v-model="form.color"
                        type="color"
                        class="w-20 h-10"
                    />
                    <p v-if="form.errors.color" class="text-sm text-red-500">
                        {{ form.errors.color }}
                    </p>
                </div>

                <!-- Campo: Preço -->
                <div>
                    <Label for="price">Preço</Label>
                    <Input
                        id="price"
                        v-model="form.price"
                        type="number"
                        step="0.01"
                        placeholder="Digite o preço"
                        class="w-full"
                    />
                    <p v-if="form.errors.price" class="text-sm text-red-500">
                        {{ form.errors.price }}
                    </p>
                </div>

                <!-- Campo: Status -->
                <FormField v-slot="{ componentField }" name="status">
                    <FormItem>
                        <FormLabel>Status</FormLabel>
                        <Select v-bind="componentField" v-model="form.status">
                            <FormControl>
                                <SelectTrigger>
                                    <SelectValue placeholder="Selecione o status" />
                                </SelectTrigger>
                            </FormControl>
                            <SelectContent>
                                <SelectGroup>
                                    <SelectItem value="active">Ativo</SelectItem>
                                    <SelectItem value="inactive">Inativo</SelectItem>
                                    <SelectItem value="in_maintenance">Em Manutenção</SelectItem>
                                    <SelectItem value="in_route">Em Rota</SelectItem>
                                </SelectGroup>
                            </SelectContent>
                        </Select>
                        <FormMessage />
                    </FormItem>
                </FormField>

                <!-- Campo: Manutenção nos Últimos 6 Meses -->
                <FormField v-slot="{ componentField }" name="maintenance_last_6_months">
                    <FormItem>
                        <FormLabel>Manutenção nos últimos 6 meses:</FormLabel>
                        <Select v-bind="componentField" v-model="form.maintenance_last_6_months">
                            <FormControl>
                                <SelectTrigger>
                                    <SelectValue :placeholder="form.maintenance_last_6_months ? 'Sim' : 'Não'" />
                                </SelectTrigger>
                            </FormControl>
                            <SelectContent>
                                <SelectGroup>
                                    <SelectItem value="true">Sim</SelectItem>
                                    <SelectItem value="false">Não</SelectItem>
                                </SelectGroup>
                            </SelectContent>
                        </Select>
                        <FormMessage />
                    </FormItem>
                </FormField>

                <!-- Botão de Salvar -->
                <div>
                    <Button type="submit" :disabled="form.processing">
                        {{ form.processing ? 'Salvando...' : 'Salvar' }}
                    </Button>
                </div>
            </form>
        </div>
    </AppLayout>
</template>