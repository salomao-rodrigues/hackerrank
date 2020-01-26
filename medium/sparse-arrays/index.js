function matchingStrings(strings, queries) {
  return queries.map(q => (
    strings.filter(s => s === q).length
  ))
}

console.log(matchingStrings(['aba', 'baba', 'aba', 'xzxb'], ['aba', 'xzxb', 'ab']).join(',') === '2,1,0')
console.log(matchingStrings(['def', 'de', 'fgh'], ['de', 'lmn', 'fgh']).join(',') === '1,0,1')