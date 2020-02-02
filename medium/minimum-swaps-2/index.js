function minimumSwaps(arr) {
  let permutations = 0
  for (let i = 0; i < arr.length; i += 1) {
    let indexOfCurrent

    for (let k = i; k < arr.length; k += 1) {
      if (arr[k] === i+1) {
        indexOfCurrent = k
        break
      }
    }
    if (indexOfCurrent !== i) {
      arr[indexOfCurrent] = arr[i]
      arr[i] = i+1
      permutations += 1
    }
  }

  return permutations
}

console.assert(minimumSwaps([1, 3, 5, 2, 4, 6, 7]) === 3)
