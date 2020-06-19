import Panel from '@modules/Panels/Panel';
import StateEvents from '@tools/StateEvents';

/**
 * The stage events.
 */
export default class PanelEvents extends StateEvents {
    /**
     * The constructor.
     *
     * @param element { Element }
     *   A DOM element.
     * @param panel { Panel }
     *   A panel.
     */
    public constructor(element: Element, panel: Panel) {
        super(element, 'panel', { 'key': panel.getKey(), 'side': panel.getSide() });
    }
}
