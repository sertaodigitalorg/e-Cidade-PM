//CHECKSUM:622ffc0b7cb79c737cf63814d9ae6972bc2a89f91fded043fc736ed6dd7e68cc
const _ = require('lodash')

async function visitEvent() {
  if (event.type === 'visit') {
    const user = await bp.users.getOrCreateUser('web', event.target, event.botId)

    const { timezone, language } = event.payload
    const isValidTimezone = _.isNumber(timezone) && timezone >= -12 && timezone <= 14 && timezone % 0.5 === 0
    const isValidLanguage = language.length < 4 && !_.get(user, 'result.attributes.language')

    const newAttributes = {
      ...(isValidTimezone && { timezone }),
      ...(isValidLanguage && { language })
    }

    if (Object.getOwnPropertyNames(newAttributes).length) {
      event.state.user = { ...event.state.user, ...newAttributes }
    }
  }
}

return visitEvent()
