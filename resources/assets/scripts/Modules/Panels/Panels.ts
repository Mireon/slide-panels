import Selector from '@tools/Selector';
import Panel from '@modules/Panels/Panel';
import Target from '@entities/Target';

/**
 * ...
 */
class Panels {
    /**
     * ...
     *
     * @type Array<Panel>
     */
    private panels = Array<Panel>();

    /**
     * The constructor.
     */
    public constructor() {
        this.initPanels();
    }

    /**
     * ...
     *
     * @return void
     */
    private initPanels(): void {
        Selector.element('panel').each((element: Element) => this.panels.push(new Panel(element)));
    }

    /**
     * ...
     *
     * @param id { string }
     *   ...
     *
     * @return Panel
     */
    public hasPanel(id: string): boolean {
        for (const panel of this.panels) {
            if (panel.isEqualId(id)) {
                return true;
            }
        }

        return false;
    }

    /**
     * ...
     *
     * @param id { string }
     *   ...
     *
     * @return Panel
     */
    public getPanel(id: string): Panel {
        for (const panel of this.panels) {
            if (panel.isEqualId(id)) {
                return panel;
            }
        }

        return null;
    }

    /**
     * ...
     *
     * @param target { Target }
     *   ...
     *
     * @return void
     */
    public show(target: Target): void {
        for (const panel of this.panels) {
            if (panel.isEqualId(target.getPanel())) {
                panel.show(target);
            } else {
                panel.hide();
            }
        }
    }

    /**
     * ...
     *
     * @return void
     */
    public hide(): void {
        for (const panel of this.panels) {
            panel.hide();
        }
    }
}

export default Panels;
