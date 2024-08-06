<div x-data="codeSnippetsData" class="code__showcase">
  <ul
    class="code__language__labels"
  >
    <template x-for="(language, index) in Object.keys(codeSnippets)" :key="language">
      <li
        x-text="language"
        :class="{'active': language === activeLanguage, 'first': index === 0}"
        x-on:click="activeLanguage = language"
      ></li>
    </template>
  </ul>
  <ul class="code__language__tabs">
    <template x-for="(code, language) in codeSnippets" :key="code">
      <li x-show="language === activeLanguage">
        <pre>
          <code x-html="hljs.highlightAuto(code).value"></code>
        </pre>
      </li>
    </template>
  </ul>
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
