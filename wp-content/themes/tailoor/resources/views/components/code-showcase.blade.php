<div x-data="codeSnippetsData" class="code__showcase relative">

  <template x-for="(code, index) in Object.values(codeSnippets)" :key="code">
    <div :class="{'last': index === 0, 'first':index !== 0}">
        <pre>
          <code x-html="hljs.highlightAuto(code).value"></code>
        </pre>
    </div>
  </template>
</div>

<script>
  const codeSnippetsData = {
    codeSnippets: JSON.parse('<?= addslashes(json_encode($codeSnippets)) ?>'),
    activeLanguage: null,
    init() {
      this.activeLanguage = Object.keys(this.codeSnippets)[0];
    }
  }
</script>
