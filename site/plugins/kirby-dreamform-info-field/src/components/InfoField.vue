<template>
  <div class="df-field df-field-info">
    <div class="df-field-header">
      <div>
        <div class="df-field-label">
          {{ fieldset.name }}
        </div>
      </div>
    </div>
    <k-writer-input v-bind="textField" :value="content.text" class="df-field-writer"
      @input="update({ text: $event })" />
  </div>
</template>

<script setup>
import { computed, ref, useApi, useBlock, usePanel, watch } from "kirbyuse";

// Will inherit props from extended default block
const props = defineProps({});
const emit = defineEmits([]);
const { field, update } = useBlock(props, emit);

const textField = computed(() => field("text", {}));

</script>

<style>
.df-field-info .df-field-writer {
  --input-padding-multiline: 0;
  --spacing-3: 0;
}
</style>
