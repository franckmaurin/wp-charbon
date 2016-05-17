import Share from './share'
import Browsering from './browsering'

const share = new Share()
const browsering = new Browsering({
  timeout: 1000,
  ready: () => {
    share.update()
  }
})
