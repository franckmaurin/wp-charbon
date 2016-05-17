import Share from './share'
import Browsering from './browsering'

const share = new Share()
const browsering = new Browsering({
  timeout: 300,
  ready: () => {
    share.update()
  }
})
