function sockMerchant(n, ar) {
  return Object.entries(
    ar.reduce(
      (groupedSocks, color) => ({
        ...groupedSocks,
        [color]: (groupedSocks[color] || 0) + 1
      }),
      {}
    )
  ).reduce((sum, [_, value]) => sum + Math.floor(value / 2), 0)
}

// tests
console.log(sockMerchant(9, [10, 20, 20, 10, 10, 30, 50, 10, 20]) === 3)
